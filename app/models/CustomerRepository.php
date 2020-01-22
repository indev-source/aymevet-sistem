<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class CustomerRepository extends Model
{
    protected $table = "clientes";

    protected $fillable = ['nombre_completo','email','telefono','credito_autorizado','direccion','vendedor_id'];

    public function seller(){
        return $this->belongsTo('App\models\UserRepository','vendedor_id');
    }
    public function addCustomer($data){
        return CustomerRepository::create($data);
    }
    public function editCustomer($data){
        return $this->fill($data)->save();
    }

    public function scopeGetCustomers($query){
        return $query->orderBy('created_at','desc');
    }
    public function scopeGetCustomersBySeller($query,$sellerId){
        return $query->where('vendedor_id',$sellerId);
    }
}
