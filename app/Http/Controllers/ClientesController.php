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
    }
    public function getCustomerByid($customerId){
        return $this->customers->findOrFail($customerId);
    }
    public function index(){
        $clientes = $this->customers->getCustomers()->get();
        return view('clientes.index',compact('clientes'));
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
            return redirect('/clientes')->with('status_success','Cliente actualizado correctamente');
        }catch (\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
