<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Bussine;
use App\Order;
use App\ProductOrder;
use App\Marca;
use App\Proveedor;
use App\Cliente;
use Auth;
use App\Sale;
use Carbon\Carbon;
use DB;
class DashBoardController extends Controller{

    public function index(){
    
        //return $grafica;
    	return view('dashboard.index');
    }
    public function vender(){
       
    }
}
