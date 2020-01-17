<?php

namespace App\Http\Controllers\Api\V1;

use App\models\ProductRepository;
use App\models\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Auth;

class ProductController extends Controller
{
    public function __construct(ProductRepository $products, UserRepository $user){
        $this->products = $products;
        $this->user     = $user;
        $this->select   = ['id','nombre','precio1','precio2','precio3'];
    }

    public function getUserById($userId){
        return $this->user->findOrFail($userId);
    }

    //metodo para sincronizar del servidor a firebase
    public function productsSyncServer(Request $request){
        $user = $this->getUserById($request->empleado);
        $products = $this->products->getProducts('activos')->business($user->bussine_id)->get();
        return new ProductCollection($products);
       
    }
    public function index($businessId){
        $products = $this->products()->business($businessId)->get();
        return new ProductCollection($products);
    }
}
