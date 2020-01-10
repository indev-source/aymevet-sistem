<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre_completo','email','telefono','direccion','credito_autorizado','vendedor_id'];

    public function vendedor(){
        return $this->belongsTo('App\User','vendedor_id');
    }

    public function scopeClients($query,$user){
        if($user->rol == 'administrador')
            return $query->orderBy('id','desc');
        return $query->where('vendedor_id',$user);
    }

    

    public static function createNewClient($request){
        return Cliente::create([
            'nombre_completo'=>$request->nombre_completo,
            'email'=>$request->email,
            'telefono'=>$request->telefono,
            'direccion'=>$request->direccion,
            'credito_autorizado'=>$request->credito_autorizado,
            'vendedor_id'=>$request->vendedor_id
        ]);
    }

    public function store($request){
        return Cliente::create($request);
    }
}
