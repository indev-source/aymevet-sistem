<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoTraspaso extends Model
{
	protected $table = 'producto_traspasos';
    protected $primaryKey = 'id';

    public function scopeProducts($query,$traspaso){
        return $query->where('traspaso_id',$traspaso);
    }

    public function product(){
        return $this->belongsTo('App\Product','producto_id');
    }
}
