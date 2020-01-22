<?php

namespace App\Http\Controllers\Api\V1;

use App\models\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;
use App\models\UserRepository;
class CustomerController extends Controller{

    public function  __construct(CustomerRepository $customers){
        $this->customers = $customers;
    }

    public function index($sellerId){
        $customers = $this->customers->getCustomersBySeller($sellerId)->get();
        return new CustomerCollection($customers);
    }

    public function sincronizar(Request $request){
        $seller = UserRepository::where('email',$request->email)->first();
        foreach($request->customers as $customer){
            CustomerRepository::create([
                'nombre_completo'=>$customer['nombre_completo'],
                'telefono'=>$customer['telefono'],
                'email'=>$customer['email'],
                'direccion'=>$customer['direccion'],
                'vendedor_id'=>$seller->id,
                'credito_autorizado'=>0.0
            ]);
        }
        return response()->json("La sincronización fue realizada correctamente");
    }
}
