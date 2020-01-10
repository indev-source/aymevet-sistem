<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Traspaso extends Model
{
    public function senvia(){
        return $this->belongsTo('App\Bussine','envia');
    }
    public function srecibe(){
        return $this->belongsTo('App\Bussine','recibe');
    }
    public function usuario(){
        return $this->belongsTo('App\User','usuario_id');
    }
    public function scopeTraspasos($query){
        return $query->orderBy('id','desc');
    }
    public function scopeOnlySend($query,$sucursalId){
        return $query->where('envia',$sucursalId);
    }
    public function scopeOnlyRecibed($query,$sucursalId){
        return $query->where('recibe',$sucursalId);
    }
    public function scopeOnlyAutorizate($query,$sucursalId){
        return $query->where('estatus','autorizado');
    }
    public static function getTraspasos(){
    	if(Auth::user()->rol == 'administrador')
    		return Traspaso::getTraspasosOBJ()->orderByID();
    	else
    		return Traspaso::getTraspasosOBJ()->byBussine()->orderByID();
    }

    public function scopeGetTraspasosOBJ($query){
    	return $query->joinBussineSend()->joinBussineReceibe()->joinUserSend();
    }
    public function scopeJoinBussineSend($query){
    	return $query->join('bussines as bussine_envia','traspasos.envia','bussine_envia.id');
    }
    public function scopeJoinBussineReceibe($query){
    	return $query->join('bussines as bussine_recibe','traspasos.recibe','bussine_recibe.id');
    }
    public function scopeJoinUserSend($query){
    	return $query->join('users','traspasos.usuario_id','users.id');
    }
    public function scopeByBussine($query){
    	return $query->where('traspasos.envia',Auth::user()->bussine_id)->orWhere('traspasos.recibe',Auth::user()->bussine_id);
    }
    public function scopeOrderByID($query){
    	return $query->orderBy('traspasos.id','desc');
    }
    public function scopeFinder($query,$id){
        return $query->where('traspasos.id',$id);
    }
    public function scopeSelectData($query){
    	return $query->select(
    		'traspasos.id',
    		'traspasos.envia',
    		'traspasos.recibe',
    		'traspasos.usuario_id',
    		'traspasos.estatus',
    		'traspasos.created_at as fecha',
    		'bussine_recibe.nombre as suc_recibe',
    		'bussine_envia.nombre as suc_envia',
    		'users.name as usuario'
    	);
    }
}
