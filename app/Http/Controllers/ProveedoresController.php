<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Auth;
class ProveedoresController extends Controller
{
    public function index(){
        $providers = Proveedor::all();
        return view('proveedores.index',compact('providers'));
    }
    public function create(){
        $cliente = new Proveedor();
        $operacion = 0;
        $url = "proveedores/";
        return view('proveedores.create',compact('cliente','operacion','url'));
    }
    public function edit($id){
        $cliente = Proveedor::find($id);
        $operacion = 1;
        $url = "proveedores/".$id;
        return view('proveedores.create', compact('cliente','operacion','url'));
    }
    public function store(Request $request){
        $provider = new Proveedor();
        $provider->nombre_completo = $request->nombre_completo;
        $provider->email  = $request->email;
        $provider->telefono = $request->telefono;
        $provider->save();
        return redirect(Auth::user()->rol.'/proveedores')->with('status_success','El proveedor fue agregado correctamente');
    }
    public function update(Request $request , $id){
        $provider = Proveedor::find($id);
        $provider->nombre_completo = $request->nombre_completo;
        $provider->email = $request->email;
        $provider->telefono = $request->telefono;
        $provider->save();
        return redirect('proveedores.index')->with('status_success', 'El proveedor fue actualizado correctamente');

        
    }
}
