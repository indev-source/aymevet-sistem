<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ProductRepository;
use App\models\BusinessRepository;
use App\models\SaleRepository;
use App\models\CustomerRepository;
use App\models\TraspasoRepository;
use Auth;
class MyBusinessController extends Controller
{
    public function index(){
        return view('mi-sucursal.index');
    }
    public function products(){
        $productRepository = new ProductRepository();
        $products = $productRepository->getProducts()->business(Auth::user()->bussine_id)->get();
        return view('mi-sucursal.products.index',['products'=>$products]);
    }
    public function sales(){
        $saleRepository = new SaleRepository();
        $sales          = $saleRepository->sales('contado')->business(Auth::user()->bussine_id)->get();
        return view('mi-sucursal.sales.index',['sales'=>$sales]);
    }
    public function customers(){
        $customerRepository = new CustomerRepository();
        $customers          = $customerRepository->getCustomersBySeller(Auth::user()->id)->get();
        return view('mi-sucursal.customers.index',['customers'=>$customers]);
    }
    public function traspasos(){
        $traspasos = TraspasoRepository::traspasos()->getByBusiness(Auth::user()->bussine_id)->get();
        return view('mi-sucursal.traspasos.index',['traspasos'=>$traspasos]);
    }
    public function aceptedTraspaso($traspasoId){
        $traspaso = TraspasoRepository::findOrFail($traspasoId);
        $traspaso->estatus = 'aceptado';
        $traspaso->save();
        alert()->success('El traspasos fue aceptado exitosamente');
        return back();
    }
    
}
