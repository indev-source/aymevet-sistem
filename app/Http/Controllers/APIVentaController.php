<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\ProductOrder;
use App\Product;
class APIVentaController extends Controller
{
    public function store(Request $request){
        $sale = Sale::storeSale($request->vendedor, $request->sucursal);
        return self::sale($sale->id);
    }
    public function sale($saleID){
        $sale = Sale::find($saleID);
        $products = $sale->products()->get();
        $data = array(
            'sale'=>$sale,
            'products'=>$products
        );
        return response()->json($data);
    }

    public function productoadd(Request $request){
        try{
            $product = Product::find($request->producto_id);
            $agregarVenta = ProductOrder::verificarStock($product->existencia,$request->cantidad);
            if($agregarVenta == true){
                $agregarVenta = new ProductOrder();
                $agregarVenta->agregar($product->id,$request->cantidad,$request->precio,$request->sale_id);
                return self::updateSale($request->sale_id);
            }else{
               return response()->json("no es posible agregar a la venta");
            }
        }catch(Exception  $e){
            return $e->getMessage();
        }
    }
    public function updateSale($saleID){
        $sale = Sale::find($saleID);
        $subtotal = $sale->subtotal();
        $sale->total = $subtotal;
        $sale->save();
        return self::sale($saleID);
    }

    public function terminarVenta(Request $request){
        if($request->tipo_pago == "credito")
           return self::pagoCredito($request);
        return self::pago($request,"contado","terminado",$request->sale_id);
    }
    public function pago($request,$formaPago,$status,$sale_id){
        $sale = Sale::find($sale_id);
        $sale->tipoPago = $request->tipo_pago;
        $sale->cliente  = $request->cliente_id;
        $sale->total    = $sale->subtotal();
        $sale->formaPago = $formaPago;
        $sale->estatus   = $status;
        $sale->save();
        return self::quitarInventario($sale);
    }
    public function pagoCredito($request){
        $cliente = Cliente::find($request->cliente_id);
        if($cliente->estatus == "deuda")
            return self::customerWithDeuda($cliente);
        else
            return self::pago($request,"credito","debe",$request->sale_id);
    }
    public function customerWithDeuda($cliente){
        return back()->with('customer_status',"El cliente: ".$cliente->nombre_completo." tiene adeudos");
    }

    public function quitarInventario($sale){
        foreach($sale->products()->get() as $product){
            $productToUpdate = Product::find($product->productoID);
            $productToUpdate->existencia -= $product->cantidad;
            $productToUpdate->save();
        }
        return self::sale($sale->id);
    }
}
