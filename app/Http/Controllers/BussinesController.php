<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bussine;
use App\Category;
use App\Product;
use Auth;

use App\models\BusinessRepository;
class BussinesController extends Controller{


    private $activo = 'activo';

    public function index(){
        $business = BusinessRepository::business($this->activo)->get();
        return view('bussines.index',compact('business'));
    }
    public function create()
    {
        return view('bussines.create');
    }
    public function store(Request $request)
    {
        try{
            Bussine::createNewBussine($request);
            $mensaje = "La sucursal fue agregada exitosamente";
            return redirect('dashboard/v/admin/sucursales')->with('status_success',$mensaje);
        }catch(\Exception $e){
            dd($e);
        }
    }
    public function show($id)
    {
        $bussine = Bussine::find($id);
        return view('bussines.show',compact('bussine'));
    }
    public function products($bussine_id){
        $products   = Product::procedureProductsByBussine($bussine_id);
        $categories = Category::procedureIndex();
        $bussines   = Bussine::procedureIndex();
        return view('products.index',compact('products','categories','bussines'));
    }
    public function edit($id)
    {
        $bussine = Bussine::find($id);
        return view('bussines.edit',compact('bussine'));
    }
    public function update(Request $request, $id)
    {
        try{
            Bussine::updateBussine($id,$request);
            $mensaje = "La sucursal fue actualizada exitosamente";
            return redirect('dashboard/v/admin/sucursales')->with('status_success',$mensaje);
        }catch(\Exception $e){
            dd($e);
        }
    }
    public function destroy($id)
    {
        //
    }
}
