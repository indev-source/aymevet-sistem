<?php

namespace App\Http\Controllers\Api\V1;

use App\models\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function __construct(ProductRepository $products){
        $this->products = $products;
        $this->select   = ['id','nombre','precio1','precio2','precio3','categoria_id','marca_id','proveedor_id'];
    }

    public function products(){
        return $this->products->getProducts('activos');
    }
    public function index($businessId){
        $products = $this->products()->business($businessId)->get();
        return new ProductCollection($products);
    }
}
