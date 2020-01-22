<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductTraspasoRepository extends Model
{
    protected $table = 'producto_traspasos';
    protected $primaryKey = 'id';

    protected $fillable = ['traspaso_id','producto_id','cantidad'];

    public function addProduct($data){
        return ProductTraspasoRepository::create($data);
    }
    public function editProductIntransfer($data){
        return $this->fill($data)->save();
    }
    public function isTheProductInTransfer($productId){
        return $this->getProductByProductId($productId);
    }
    public function getProductByProductId($productId){
        return $this->where('producto_id',$productId)->first();
    }
}
