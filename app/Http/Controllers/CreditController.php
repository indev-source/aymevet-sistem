<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credit;
use  App\Cliente;
use Auth;
use DB;

use App\models\CustomerRepository;
use App\models\CreditRepository;
class CreditController extends Controller{

    public function __construct(CreditRepository $credits){
        $this->credits = $credits;
    }
    public function getCredits(){
        return $this->credits->getCredits();
    }
    public function index(){
        $credits = $this->getCredits()->get();
        return view('credits.index',compact('credits'));
    }
    public function create(CustomerRepository $customers){
        $customers = $customers->getCustomers(Auth::user())->get();
        return view('credits.create',compact('customers'));
    }
    public function show($creditId){
        $credit    = $this->credits->getCreditById($creditId);
        $sale      = $credit->sale();
        $products  = $sale->products()->get();
        $total     = $credit->total();
        $pays      = $credit->pays()->get();
        $payed     = $credit->payed();
        $toPay     = $credit->toPay();
        return view ('credits.show',['credit'=>$credit,'sale'=>$sale,'products'=>$products,'total'=>$total,'pays'=>$pays,'payed'=>$payed,'toPay'=>$toPay]);
    }
}
