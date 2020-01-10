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
    	$users    = User::countUsers();
    	$products = Product::countProducts();
    	$categories = Category::countCategories();
        $bussines   = Bussine::count();
        $brands     = Marca::count();
        $providers  = Proveedor::count();
        $clientes   = Cliente::count();

        $grafica    = DB::select('call grafica_ventas(?)',array(Carbon::now()->format('Y-m-d')));
        //return $grafica;
    	return view('dashboard.index',compact('users','products','categories','bussines','grafica','brands','providers','clientes'));
    }
    public function vender(){
       
    }
}
