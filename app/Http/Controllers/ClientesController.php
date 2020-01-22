<?php

namespace App\Http\Controllers;

use App\models\UserRepository;
use Illuminate\Http\Request;
use App\Cliente;
use Auth;
use App\User;

use App\models\CustomerRepository;

class ClientesController extends Controller{

    public function __construct(CustomerRepository $customers){
        $this->customers = $customers;
        $this->middleware('userRol')->except(['create','show','store','edit','update']);
    }
    public function getCustomerByid($customerId){
        return $this->customers->findOrFail($customerId);
    }
    public function index(){
        $customers = $this->customers->getCustomers()->get();
        return view('clientes.index',compact('customers'));
    }
    public function create(){
        return view('clientes.create');
    }
    public function store(Request $request){
        $request['vendedor_id'] = Auth::user()->id;
        $this->customers->addCustomer($request->all());
        alert()->success('El cliente fue registrador correctamente');
        if (Auth::user()->rol == 'administrador')
            return redirect('/administrador/clientes');
        return redirect('mi-sucursal/clientes');
    }
    public function show($id)
    {
        //
    }
    public function edit($customerId){
        $customer = $this->getCustomerByid($customerId);
        $sellers  = UserRepository::all();
        return view('clientes.edit',['customer'=>$customer,'sellers'=>$sellers]);
    }
    public function update(Request $request, $customerId){
        try {
            $this->getCustomerByid($customerId)->editCustomer($request->all());
            alert()->success('El cliente fue actualizado correctamente');
            if (Auth::user()->rol == 'administrador')
                return redirect('/administrador/clientes');
            return redirect('mi-sucursal/clientes');
        }catch (\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
    public function destroy($id)
    {
        //
    }
}
