<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TraspasoRepository extends Model
{
    protected $table = 'traspasos';

    public function business(){
        return $this->belongsTo('App\models\BusinessRepository','sucursal_id');
    }
    public function user(){
        return $this->belongsTo('App\models\UserRepository','usuario_id');
    }

    public function scopeTraspasos($query){
        return $query->orderBy('created_at','asc');
    }
    public function scopeGetByStatus($query,$status){
        if($status)
            return $query->where('estatus',$status);
    }
}
