<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CreditRepository extends Model
{
    protected $table = 'creditos';

    protected $fillable = ['venta','fecha'];

    public function sale(){
        return $this->belongsTo('App\models\SaleRepository','venta')->first();
    }
    public function pays(){
        return $this->hasMany('App\models\PayRepository','credito');
    }
    public function payed(){
        return $this->pays->sum('pago');
    }
    public function toPay(){
        return $this->total() - $this->payed();
    }
    public function total(){
        return $this->sale()->total();
    }
    public function getCreditById($creditId){
        return CreditRepository::findOrFail($creditId);
    }
    public function isCreditCompleted($credit){
        return $this->getCreditById($credit)->toPay() == 0.0 ? true : false;
    }
    public function creditCompleted($credit){
        return $this->getCreditById($credit)->completed();
    }
    public function completed(){
        $this->estatus = 'pagado';
        return $this->save();
    }
    public function createCredit($saleId){
        return CreditRepository::create(['venta'=>$saleId,'fecha'=>now()]);
    }
    public function scopeGetCredits($query){
        return $query->firstLatests();
    }
    public function scopeGetCreditsByStatus($query,$status){
        return $query->where('estatus',$status);
    }
    public function scopeFirstLatests($query){
        return $query->orderBy('created_at','desc');
    }
}
