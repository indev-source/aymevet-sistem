<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Auth;
use DB;
class ProductOrder extends Model
{
    protected $table = 'producto_ventas';

    public static function procedureGetProductsOrder($orderID){
        return DB::select('call get_products_order(?)',array($orderID));
    }

    public static function getOrCreateProductInOrders($code,$amount,$price){
        //existe producto en el inventario
        $product = Product::LIKECodigo($code)->byBussine()->first();
        if($product == null)
            return "false";
        $product = ProductOrder::getProductsOrder(\Session::get('orderID'))->byCode($code)->first();
        if(count($product)==1)
            //actualizar producto en la order
            return ProductOrder::updateProductInOrder($product,$amount,$code);
        else
            //aagregar producto en la orden
            return ProductOrder::addProductInOrder($product,$code,$amount,$price);
    }
    public function scopeGetProductsOrder($query,$orderID){
        return $query->byOrder($orderID)->joinProducts()->selectData()->orderID();
    }
    public function scopeByOrder($query,$orderID){
        return $query->where('product_orders.order_id',$orderID);
    }
    public function scopeJoinProducts($query){
        return $query->join('inventarios','product_orders.product_id','inventarios.id');
    }
    public function scopeSelectData($query){
        return $query->select(
            'product_orders.id',
            'product_orders.amount',
            'product_orders.subtotal',
            'product_orders.price',
            'inventarios.nombre as producto'
        );
    }
    public function scopeOrderID($query){
        return $query->orderBy('product_orders.id','desc');
    }
    public function scopeByCode($query,$code){
        return $query->where('inventarios.codigo',$code);
    }
    public static function updateProductInOrder($product,$amount,$code){
        $product_inventario = Product::LIKECodigo($code)->select('existencia','id')->first();
        if($product_inventario->existencia >= ($amount+$product->amount)){
            $product->amount +=$amount;
            $product->subtotal = (($product->amount)*$product->price);
            $product->save();
            return $product;
        }else{
            return "false";
        }
        
    }
    public static function addProductInOrder($product,$code,$amount,$price){
        $product = Product::LIKECodigo($code)->byBussine()->select('existencia','id')->first();
      
        if(count($product)==1){
            return ProductOrder::verifyStock($product,$amount,$price);
        }else{
            return "false";
        }
    }
    
    public static function createInOrder($product,$amount,$price){
        return ProductOrder::create([
            'product_id'=>$product->id,
            'amount'=>$amount,
            'order_id'=>\Session::get('orderID'),
            'subtotal'=>$product->precio_Venta * $amount,
            'price'=>$price
        ]);
    }


    public static function verificarStock($stock,$cantidad){
        if($stock >= $cantidad)
            return true;
        return false;
    }

    public function agregar($productoID,$cantidad,$precio,$venta){
        $enVenta = $this->enVenta($productoID,$venta);
        
        if($enVenta['enVenta'] == true)
            return $this->actualizarProducto($enVenta['producto'],$cantidad,$precio);
        else
            return $this->agregarNuevoProductoEnVenta($productoID,$cantidad,$precio,$venta);
    }
    public function agregarNuevoProductoEnVenta($productoID,$cantidad,$precio,$venta){
        $subtotal = $cantidad * $precio;
        $producto = new ProductOrder();
        $producto->sale_id = $venta;
        $producto->product_id = $productoID;
        $producto->cantidad = $cantidad;
        $producto->precio = $precio;
        $producto->subtotal = $subtotal;
        return $producto->save();
    }
    public function actualizarProducto($producto,$cantidad,$precio){
        $subtotal = $cantidad * $precio;
        $producto->cantidad = $cantidad;
        $producto->precio = $precio;
        $producto->subtotal = $subtotal;
        return $producto->save();
    }
    public function enVenta($productoID,$venta){
        $data = array();
        $producto = ProductOrder::where([['product_id',$productoID],['sale_id',$venta]])->first();
        if($producto == null){
            $data['enVenta'] = false;
        }else{
            $data['enVenta'] = true;
            $data['producto'] = $producto;
        }
        return $data;
    }
}
