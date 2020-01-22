<?php

namespace App\models;

use App\Sale;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class SaleRepository extends Model
{
    protected $table = "ventas";
    protected $fillable = [
        'vendedor','sucursal', 'fecha', 'cliente', 'tipo_venta', 'total', 'descuento_p', 'descuento_d',
        'forma_pago', 'estatus'
    ];

    public function seller(){
        return $this->belongsTo('App\models\UserRepository','vendedor');
    }
    public function customer(){
        return $this->belongsTo('App\models\CustomerRepository','cliente');
    }
    public function business(){
        return $this->belongsTo('App\models\BusinessRepository','sucursal');
    }
    public function products(){
        return $this->belongsToMany('App\models\ProductRepository','producto_ventas','sale_id','product_id')
            ->select(
                'inventarios.nombre',
                'inventarios.id as product_id',
                'inventarios.codigo',
                'producto_ventas.precio',
                'producto_ventas.subtotal',
                'producto_ventas.cantidad'
            );
    }
    public function total(){
        return $this->products()->sum('subtotal');
    }
    public function removeStock($products){
        foreach($products as $productSold){
            $product = ProductRepository::findOrFail($productSold->product_id);
            $product->existencia -=  $productSold->cantidad;
            $product->save();
        }
    }
    public function addToStock($products){
        foreach($products as $productSold){
            $product = ProductRepository::findOrFail($productSold->product_id);
            $product->existencia +=  $productSold->cantidad;
            $product->save();
        }
    }
    public function getOrCreateSale($saleId){
        if($saleId)
            return $this->getSaleById($saleId);
        return $this->createSale();
    }
    public function createSale(){
        return SaleRepository::create([
            'vendedor'=>Auth::user()->id,
            'sucursal'=>Auth::user()->bussine_id,
            'fecha'=>now()
        ]);
    }
    public function createSaleHowPayCredit($data){
        return SaleRepository::create($data);
    }
    public function getSaleById($saleId){
        return SaleRepository::findOrFail($saleId);
    }
    public function  scopeSales($query,$typeSale){
        return $query->getSalesByTypeSale($typeSale)->saleEnded();
    }
    public function scopeGetSalesByTypeSale($query,$typeSale){
        return $query->where('ventas.tipo_venta',$typeSale);
    }
    public function scopeSaleEnded($query){
        return $query->where('ventas.estatus','pagado');
    }
    public function scopeCustomers($query,$customerId){
        return $query->where('cliente',$customerId);
    }
    public function scopeBusiness($query,$business){
        return $query->where('sucursal',$business);
    }
    public function scopeGanancias($query,$total,$inversion){
        return (double) $total - $inversion;
    }
    public function scopeTotalSales($query){
        return (double) $query->join('producto_ventas','ventas.id','producto_ventas.sale_id')->sum('producto_ventas.subtotal');
    }
    public function scopeInversion($query){
        return (double)$query->join('producto_ventas','ventas.id','producto_ventas.sale_id')->join('inventarios','producto_ventas.product_id','inventarios.id')
        ->select(DB::raw('sum(inventarios.costo*producto_ventas.cantidad) as inversion'))->first()->inversion;
    }
    public function scopeSalesToday($query){
        return $query->whereDate('ventas.fecha',NOW());
    }
    public function changeToStatus($status){
        $this->estatus = $status;
        return $this->save();
    }

}
