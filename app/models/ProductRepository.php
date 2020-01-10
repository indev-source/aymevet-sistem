<?php

namespace App\models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends Model{

    protected $table = 'inventarios';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'nombre', 'codigo', 'existencia', 'costo', 'porcentaje1', 'porcentaje2', 'porcentaje3', 'precio1', 'precio2',
        'precio3', 'bussine_id', 'categoria_id', 'clave_unidad', 'clave_producto', 'lote', 'ieps', 'descripcion',
        'marca_id', 'proveedor_id', 'iva'
    ];

    public function categoria(){
        return $this->belongsTo('App\models\CategoryRepository','categoria_id');
    }
    public function proveedor(){
        return $this->belongsTo('App\models\ProviderRepository','proveedor_id');
    }
    public function marca(){
        return $this->belongsTo('App\models\BrandRepository','marca_id');
    }
    public function sucursal(){
        return $this->belongsTo('App\models\BusinessRepository','bussine_id');
    }
    public function createProduct($data){
        return ProductRepository::create($data);
    }
    public function editProduct($data){
        return $this->fill($data)->save();
    }
    public function changeStatus($status){
        $this->estatus = $status;
        return $this->save();
    }
    public function scopeGetProducts($query){
        return $query->where('estatus','activo');
    }
    public function scopeCategory($query,$categoryId){
        return $query->where('categoria_id',$categoryId);
    }
    public function scopeBrand($query,$brandId){
        return $query->where('marca_id',$brandId);
    }
    public function scopeProvider($query,$providerId){
        return $query->where('proveedor_id',$providerId);
    }
    public function scopeBusiness($query,$businessId){
        return $query->where('bussine_id',$businessId);
    }
}
