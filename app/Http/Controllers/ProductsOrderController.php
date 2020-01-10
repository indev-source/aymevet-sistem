<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductOrder;
use App\Product;
use App\Sale;
class ProductsOrderController extends Controller{

    public function products(){
        $order = Order::getOrder(\Session::get('orderID'));
        \Session::put('orderID',$order->id);

        $products = ProductOrder::getProductsOrder($order->id)->get();
        return response()->json($products);
    }
    public function search(Request $request){
        //$productsOnSale = ProductOrder::getProductsOnSale($request->search);
        $products_inventario = Product::getProducts()->getLIKE($request->search)->byBussine()->get();
        
        $order = Order::getOrder(\Session::get('orderID'));
        \Session::put('orderID',$order->id);
        $productos = ProductOrder::getProductsOrder($order->id)->get();


        $subtotal = ProductOrder::where('order_id',\Session::get('orderID'))->sum('subtotal');
        $order->subtotal = $subtotal;
        $order->status = "terminado";
        $order->save();

            //total
        $total = $order->subtotal;
        $discount = 0;
        $dinDiscount = 0;
        $pay = 0;
        $porPay = 0;
             //tarjeta dinero que se paga de mas
        if($order->pay != 0){
            $total += ($order->subtotal * $order->pay)/100;
                //porcentaje tarjeta
            $porPay = Bussine::find(Auth::user()->bussine_id)->tarjeta;
        }
            //descuento porcentaje
        if($order->discount !=0){
            $discount = $order->discount;
                //dinero descontado
            $dinDiscount = ($order->subtotal *$order->discount)/100;
            $total -= $dinDiscount;
        }
            //subtotal
        $subtotal = $order->subtotal;

        $detail = array(
            'total'=>$total,
            'discount'=>$discount,
            'cashDiscount'=>$dinDiscount,
            'subtotal'=>$subtotal,
            'pay'=>$pay,
            'porPay'=>$porPay
        );
        return view('dashboard.vender',compact('productos','detail','products_inventario'));
        //return response($products);
    }
    public function store(Request $request){
        try{
            $response  = ProductOrder::getOrCreateProductInOrders($request->code,1);
            $msj = "El producto es insuficiente";
            if($response != "false")
                return redirect('/dashboard/vender');
            else return back()->with('stock_none',$msj);
        }catch(\Exception $e){
            return response($e,500);
        }
    }
    public function store2(Request $request){
        
        try{
            $product = Product::find($request->product_id);
            $agregarVenta = ProductOrder::verificarStock($product->existencia,$request->cantidad);
            if($agregarVenta == true){
                $agregarVenta = new ProductOrder();
                $agregarVenta->agregar($product->id,$request->cantidad,$request->price,\Session::get('orderID'));
                return self::updateSale();
            }else{
                dd("no hay existencia");
            }
        }catch(\Exception $e){
            dd($e);
        }
    }
    public function updateSale(){
        $sale = Sale::getOrCreateSale(\Session::get('orderID'));
        \Session::put('orderID',$sale->id);

        $subtotal = $sale->subtotal();

        $sale->total = $subtotal;
        $sale->save();

        return redirect('vender');



    }
    public function destroy(Request $request)
    {
        $product = ProductOrder::where([['product_id',$request->producto_id],['sale_id',\Session::get('orderID')]])->delete();
        return back();
    }
}
