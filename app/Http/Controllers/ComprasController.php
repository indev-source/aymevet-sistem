<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Product;
use App\ProductCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Server\RequestEvent;
class ComprasController extends Controller
{
    public function index(){
        $compras = Compra::compras()->get();
        return view('compras.index',compact('compras'));
    }
    public function create(){

        return view('compras.create');
    }
    public function store(Request $request)
    {
        try{
            $compra = new Compra;

            if($request->tipo_compra == 'contado'){
                $request['estatus'] = "pagado";
            }else{
                $request['estatus'] = "adeudo";
            }
            $compra = $compra->store($request->all());
            $msg = "la compra se agrego correctamente, selecciona los productos de la compra";
            return redirect("administrador/producto-compras/".$compra->id)->with("status_success",$msg);
        }catch (\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public function productosAdd($compra_id){
        $compra = Compra::findOrFail($compra_id);
        $busine = Auth::user()->bussine_id;
        $products = Product::yourProducts($busine)->get();
        $productsCompra = ProductCompra::products($compra->id)->get();
        return view('compras.producto-compras',compact('compra','products','productsCompra'));
    }
    public function addToCompra(Request $request){
        try{
            $producto = ProductCompra::issetProductOnCompra($request->compra_id,$request->producto_id);
            if($producto == false){
                $addToCompra = new ProductCompra;
                $addToCompra = $addToCompra->store($request->all());
            }else{
                $producto->cantidad = $request->cantidad;
                $producto->save();
            }
            return back();
        }catch(\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public  function addToInventario(Request $request, $compra_id){
        //agregar productos al inventario
        $compra = Compra::findOrFail($compra_id);
        $productsCompra = ProductCompra::products($compra->id)->get();
        foreach ($productsCompra as $productCompra){
            $product = Product::findOrfail($productCompra->producto_id);
            $product->existencia += $productCompra->cantidad;
            $product->save();
        }
        return redirect('/administrador/compras')->with('status_success','Los productos fueron agregados al inventario');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
