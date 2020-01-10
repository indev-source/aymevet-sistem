<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class APIProductController extends Controller
{
    public function products($userID){
        $user = User::find($userID);
        $products = Product::products()->APIYourProducts($user->bussine_id)
        ->select('id as productId','nombre as product','precio1 as price1','precio2 as price2','precio3 as price3','codigo as code','existencia as stock')->get();
        return response()->json($products);
    }
    public function product($product){
        $product = Product::find($product);
        return response()->json($product);
    }
}
