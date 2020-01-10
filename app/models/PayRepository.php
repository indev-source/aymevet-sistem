<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PayRepository extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['venta','credito','pago'];

    public function addPay($data){
        return PayRepository::create($data);
    }
}
