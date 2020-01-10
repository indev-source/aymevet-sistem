<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Product extends Model{

    protected $table = 'inventarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'existencia',
        'codigo',
        'costo',
        'porcentaje1',
        'porcentaje2',
        'porcentaje3',
        'precio1',
        'precio2',
        'precio3',
        'bussine_id',
        'foto',
        'categoria_id',
        'marca_id',
        'proveedor_id',
        'iva',
        'clave_unidad',
        'clave_producto',
        'lote',
        'ieps',
        'descripcion',
        'caducidad'
    ];

    public function busine(){
        return $this->belongsTo('App\Bussine','bussine_id');
    }

    public function scopeProducts($query){
        return $query->orderBy('id','desc');
    }
    public function scopeYourProducts($query,$busineId){
        return $query->where('bussine_id',$busineId);
    }
    public function scopeByBussine($query){
        return $query->where('inventarios.bussine_id',Auth::user()->bussine_id);
    }
    public function scopeIssetOnBusine($query,$code,$recibe){
        return $query->where([['codigo',$code],['bussine_id',$recibe]]);
    }
    public function scopeAPIYourProducts($query,$suc){
        return $query->where('inventarios.bussine_id',$suc);
    }
    public function scopeInversionTotal($query){
        return $query->select(DB::raw('sum(costo * existencia) inversion'));
    }
    public function scopeInversionByProduct($query){
        return $query->select(DB::raw('costo * existencia as inversion , nombre, precio1, precio2,precio3,costo,existencia,bussine_id'));
    }
    public function scopeInversionBusine($query,$busineId){
        return $query->where('bussine_id',$busineId)->select(DB::raw('sum(costo * existencia) inversion'));
    }
    public function scopeOrderByBusine($query){
        return $query->orderBy('bussine_id','asc');
    }

    public static function addProductForTransfers($producto,$traspaso,$product_traspaso){
        return DB::table('inventarios')->insert(
            [
                'nombre'=>$producto->nombre,
                'codigo'=>$producto->codigo,
                'existencia'=>$product_traspaso->cantidad,
                'costo'=>$producto->costo,
                'precio1'=>$producto->precio1,
                'precio2'=>$producto->precio2,
                'precio3'=>$producto->precio3,
                'porcentaje1'=>$producto->porcentaje1,
                'porcentaje2'=>$producto->porcentaje2,
                'porcentaje3'=>$producto->porcentaje3,
                'bussine_id'=>$traspaso->recibe,
                'categoria_id'=>$producto->categoria_id,
                'foto'=>$producto->foto,
                'marca_id'=>$producto->marca_id,
                'proveedor_id'=>$producto->proveedor_id,
                'ieps'=>$producto->ieps,
                'lote'=>$producto->lote,
                'caducidad'=>$producto->caducidad,
                'descripcion'=>$producto->descripcion,
                'clave_unidad'=>$producto->clave_unidad,
                'clave_producto'=>$producto->clave_producto,
                'iva'=>$producto->iva
            ]
        );
    }

    public static function procedureIndex(){
        if(Auth::user()->rol == 'administrador')
            return DB::select('call get_products_index');
        return DB::select('call get_products_index_seller(?)',array(Auth::user()->bussine_id));
    }
    public static function procedureSearchBySomething($toSearch){
        return DB::select('call search_product_by_something(?)',array($toSearch));
    }
    public static function procedureSearchBySomethingSeller($toSearch){
        return DB::select('call search_product_by_something_seller(?,?)',array($toSearch,Auth::user()->bussine_id));
    }
    public static function procedureProductsByCategory($category_id){
        return DB::select('call get_product_by_category(?)',array($category_id));
    }
    public static function procedureProductsByBussine($bussine_id){
        return DB::select('call get_product_by_bussine(?)',array($bussine_id));
    }
    public static function getProducts(){
        if(Auth::user()->rol == 'administrador')
            return Product::getProductsOBJ()->selectData()->orderByID();
        else
            return Product::getProductsOBJ()->selectData()->orderByID()->byBussine();
    }
    public function scopeGetProductsOBJ($query){
    	return $query->joinCategory()->joinBussine()->where('inventarios.estatus','activo');
    }
    public function scopeOrderByID($query){
    	return $query->orderBy('inventarios.id','desc');
    }
    public function scopeJoinCategory($query){
        return $query->join('categorias','inventarios.categoria_id','categorias.id');
    }
    public function scopeJoinBussine($query){
        return $query->join('bussines','inventarios.bussine_id','bussines.id');
    }


    public function scopeSelectData($query){
        return $query->select(
            'inventarios.id',
            'inventarios.nombre as producto',
            'inventarios.codigo',
            'inventarios.existencia as stock',
            'inventarios.costo',
            'inventarios.precio_Venta as venta',
            'inventarios.clave_unidad',
            'inventarios.clave_producto',
            'categorias.nombre as categoria',
            'bussines.nombre as sucursal',
            'bussines.id as sucursal_id',
            'categorias.id as categoria_id',
            'inventarios.iva'
        );
    }
    public function scopeFinder($query,$id){
        return $query->where('inventarios.id',$id);
    }
    public function scopeByCategory($query,$category){
        return $query->where('inventarios.categoria_id',$category);
    }
    public function scopeGetLIKECategory($query,$category){
        return $query->where('inventarios.categoria_id',$category);
    }
    public function scopeGetLIKEBussine($query,$bussine){
        return $query->where('inventarios.bussine_id',$bussine);
    }
    public function scopeGetLIKE($query,$buscar){
        return $query->LIKEName($buscar)->LIKEClaveProduct($buscar)->LIKEClaveOne($buscar)->LIKECodigo($buscar);
    }
    public function scopeLIKEName($query,$name){
        return $query->where('inventarios.nombre','LIKE',"%$name%");
    }
    public function scopeLIKEClaveProduct($query,$clave){
        return $query->orWhere('inventarios.clave_producto','LIKE',"%$clave%");
    }
    public function scopeLIKEClaveOne($query,$clave){
        return $query->orWhere('inventarios.clave_unidad','LIKE',"%$clave%");
    }
    public function scopeLIKECodigo($query,$codigo){
        return $query->orWhere('inventarios.codigo',$codigo);
    }
    public static function createNewProduct($request){
        return Product::create($request->all());
    }
    public static function updateProduct($product,$request){
        return $product->fill($request->all())->save();
    }
    public static function countProducts(){
        return DB::table('inventarios')->where('estatus','activo')->count();
    }
    public static function stockAvailable($stock,$amount){

        if($stock >= $amount)
            return true;
        return false;
    }
    public function scopeGetProductByCode($query,$code){
        return $query->where('codigo',$code)->select('id','precio_Venta','existencia');
    }

}
