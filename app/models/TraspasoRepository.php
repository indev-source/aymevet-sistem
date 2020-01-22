<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class TraspasoRepository extends Model
{
    protected $table = 'traspasos';
    protected $fillable = ['usuario_id'];

    public function business(){
        return $this->belongsTo('App\models\BusinessRepository','sucursal_id');
    }
    public function user(){
        return $this->belongsTo('App\models\UserRepository','usuario_id');
    }
    public function products(){
        return $this->belongsToMany('App\models\ProductRepository','producto_traspasos','traspaso_id','producto_id') ->select(
            'inventarios.nombre',
            'inventarios.id as product_id',
            'inventarios.codigo',
            'producto_traspasos.cantidad'
        );;
    }
    public function getOrCreateTraspaso($traspasoId){
        if($traspasoId)
            return $this->getTraspasoById($traspasoId);
        return $this->addTraspaso();
    }
    public function getTraspasoById($traspasoId){
        return $this->findOrFail($traspasoId);
    }
    public function addTraspaso(){
        return TraspasoRepository::create(['usuario_id'=>Auth::user()->id]);
    }
    public function finish($business){
        $this->sucursal_id = $business;
        $this->estatus     = 'enviado';
        return $this->save();
    }
    public function autorizar(){
        $this->estatus = 'autorizado';
        return $this->save();
    }

    public function scopeTraspasos($query){
        return $query->orderBy('created_at','desc')->where('estatus','<>','proceso');
    }
    public function scopeGetByStatus($query,$status){
        if($status)
            return $query->where('estatus',$status);
    }
    public function scopeGetbyBusiness($query,$business){
        return $query->where('sucursal_id',$business);
    }


}
