<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'total',
        'fecha',
        'fecha_pago',
        'estatus',
        'tipo_compra'
    ];

    public function store($request){
        return Compra::create($request);
    }
    public function edit($compra,$request){
        return $compra->fill($request)->save();
    }

    public function scopeCompras($query){
        return $query->orderBy('id','desc')->
            select(DB::raw('DATEDIFF(compras.fecha_pago, NOW()) as dias_pago,compras.tipo_compra, compras.id, compras.total,compras.fecha_pago,compras.fecha, compras.estatus'));
    }
}
