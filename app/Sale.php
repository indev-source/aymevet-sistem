<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Sale extends Model{

    protected $table = 'ventas';
    protected $primaryKey = 'id';

    protected $fillable = ['vendedor','cliente','sucursal','fecha'];

    public function user(){
    	return $this->belongsTo('App\User','vendedor');
    }
    public function suc(){
        return $this->belongsTo('App\Bussine','sucursal');
    }
    public function customer(){
        return $this->belongsTo('App\Cliente','cliente');
    }

    public function scopeInversionTotal($query){
        return $query->goToProductSales()->goToProduct()->getInversion();
    }
    public function scopeGananciasTotales($query){
        $inversion = $query->inversionTotal()->first()->inversion;
        return $this->totalSales() - $inversion;
    }
    public function scopeGananciasByBusine($query,$busine){
       $inversion =  $query->inversionTotal()->busine($busine)->first()->inversion;
       return $this->totalSalesByBusine($busine) - $inversion;
    }
    public function scopeGoToProductSales($query){
        return $query->join('producto_ventas','ventas.id','producto_ventas.sale_id');
    }
    public function scopeGoToProduct($query){
        return $query->join('inventarios','producto_ventas.product_id','inventarios.id');
    }
    public function scopeGetInversion($query){
        return $query->select(DB::raw('sum(inventarios.costo*producto_ventas.cantidad) as inversion'));
    }
    public function scopeBusine($query,$busineId){
        return $query->where('ventas.sucursal',$busineId);
    }
    public function scopeSalesBetween($query,$date1,$date2){
        return $query->whereBetween('ventas.fecha',[$date1,$date2])
            ->where([['ventas.estatus','<>','proceso'],['ventas.estatus','<>','eliminado']]);
    }
    public function scopeTop10Vendidos($query,$top){
        return $query->goToProductSales()->goToProduct()->top($top);
    }
    public function scopeTop($query,$top){
        return $query->groupBy('inventarios.id')
            ->select(DB::raw('count(*) as vendidos, inventarios.nombre as producto'))
            ->orderBy('vendidos','desc')->take($top);
    }
    public function scopeSalesBySeller($query){
        return $query->goToSeller()->groupSeller();
    }
    public function scopeGoToSeller($query){
        return $query->join('users','ventas.vendedor','users.id');
    }
    public function scopeGroupSeller($query){
        return $query->where('ventas.estatus','terminado')->groupBy('ventas.vendedor')
            ->select(DB::raw('count(*) as top, users.name,users.id as seller_id, sum(ventas.total) as totalVentas'))
            ->orderBy('top','desc');
    }
    public function scopeGroupDateSeller($query,$seller){
        return $query->where('users.id',$seller)->where('ventas.estatus','terminado')
            ->groupBy('ventas.fecha')
            ->select(DB::raw('count(*) as ventas, sum(ventas.total) as total_ventas, month(ventas.fecha) as mes , ventas.fecha'))
            ->orderBy('mes','asc');
    }
    public function scopeSalesBySellerMonth($query,$seller){
        return $query->goToSeller()->groupDateSeller($seller);
    }


    public function products(){
        return $this->belongsToMany('App\Product','producto_ventas')
            ->select(
                'inventarios.nombre',
                'inventarios.id as productoID',
                'inventarios.codigo',
                'producto_ventas.precio',
                'producto_ventas.subtotal',
                'producto_ventas.cantidad'
            );
    }

    public function daySales(){
        return Sale::where([['fecha',Carbon::now()->format('Y-m-d')],['estatus','terminado']]);
    }
    public function totalDaySale(){
        return $this->daySales()->sum('total');
    }
    public function monthSales(){
        return Sale::whereMonth('created_at',Carbon::now())->where('estatus','terminado');
    }
    public function totalMonthSale(){
        return $this->monthSales()->sum('total');
    }
    public function totalSales(){
        return $this->sales()->sum('total');
    }
    public function totalSalesByBusine($busine){
        return $this->sales()->busine($busine)->sum('total');
    }
    public function scopeSales($query){
        if(Auth::user()->rol == 'administrador')
            return $query->where('estatus','<>','proceso')->orderBy('id','desc');
        return $query->where('sucursal',Auth::user()->bussine_id);
    }
    public function subtotal(){
        return $this->products()->sum('subtotal');
    }
    public static function countSales(){
        if(Auth::user()->rol == 'administrador')
            return Sale::count();
        else
            return Sale::joinOrder()->byBussine()->count();
    }
    public static function getAllSales(){
        if(Auth::user()->rol == 'administrador')
            return Sale::getAllSalesOBJ()->selectData()->orderBySaleID();
        else
            return Sale::getAllSalesOBJ()->selectData()->byBussine()->orderBySaleID();
    }
    public function scopeGetAllSalesOBJ($query){
    	return $query->joinUser()->joinBussine()->joinCliente();
    }
    public function scopeJoinUser($query){
        return $query->join('users','ventas.user_id','users.id');
    }
    public function scopeJoinOrder($query){
        return $query->join('orders','ventas.order_id','orders.id');
    }
    public function scopeJoinBussine($query){
        return $query->join('orders','ventas.order_id','orders.id')
        ->join('bussines','orders.bussine_id','bussines.id');
    }
    public function scopeJoinCliente($query){
        return $query->join('clientes','ventas.cliente_id','clientes.id');
    }
    public function scopeByBussine($query){
        return $query->where('orders.bussine_id',Auth::user()->bussine_id);
    }
    public function scopeSelectData($query){
        return $query->select(
            'ventas.id as ventaID',
            'ventas.total',
            'users.name as vendedor',
            'ventas.status',
            'ventas.tSale',
            'bussines.nombre as bussine',
            'ventas.date',
            'ventas.tipo_pago',
            'clientes.nombre_completo as cliente'
        );
    }
    public function scopeOrderBySaleID($query){
        return $query->orderBy('ventas.id','desc');
    }
    public static function getSalesLike($txtbuscar){
    	$sales = DB::table('ventas')
    	->join('users','ventas.user_id','users.id')
        ->join('orders','ventas.order_id','orders.id')
        ->join('bussines','orders.bussine_id','bussines.id')
    	->where('users.name','LIKE',"%$txtbuscar%")
    	->orWhere('ventas.status','LIKE',"%$txtbuscar%")
    	->orWhere('ventas.total','LIKE',"%$txtbuscar%")
    	->orWhere('ventas.id','LIKE',"%$txtbuscar%")
    	->select(
    		'ventas.total',
    		'ventas.user_id',
    		'ventas.total',
    		'ventas.discount as descuento',
    		'ventas.id as ventaID',
    		'ventas.status',
    		'users.name as vendedor',
            'bussines.nombre as bussine',
            'ventas.date'
    	);
    	return $sales;
    }
    public function scopeGetSalesBetween($query,$start,$end){
        return $query->joinUser()->joinBussine()->joinCliente()->whereBetween('ventas.date', [$start, $end]);
    }
    public static function getOrCreateSale($sale){

        if($sale == null)
           return Sale::storeSale(Auth::user()->id,Auth::user()->bussine_id);
        else
            return Sale::getSaleById($sale);
    }
    public static function getSalebyId($sale){
        return Sale::find($sale);
    }
    public static function storeSale($userID,$bussine){
        return Sale::create([
            'vendedor'=>$userID,
            'fecha' => now(),
            'sucursal'=>$bussine
        ]);
    }



}
