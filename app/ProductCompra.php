<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCompra extends Model
{
    protected $table = 'producto_compras';
    protected $primaryKey = 'id';
    protected $fillable = [
        'producto_id',
        'compra_id',
        'cantidad'
    ];

    public function product(){
        return $this->belongsTo('App\Product','producto_id');
    }

    public  function store($request){
        return ProductCompra::create($request);
    }

    public function scopeProducts($query,$compra){
        return $query->where('compra_id',$compra);
    }

    public static function issetProductOnCompra($compra,$producto){
        $product = ProductCompra::where([['compra_id',$compra],['producto_id',$producto]])->first();
        if($product != null)
            return $product;
        return false;
    }
}
