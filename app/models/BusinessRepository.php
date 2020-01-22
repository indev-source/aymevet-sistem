<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BusinessRepository extends Model
{
    protected $table = 'bussines';

    public function scopeBusiness($query,$status){
        return $query->getBusinessbyStatus($status);
    }
    public function scopeGetBusinessByStatus($query,$status){
        return $query->where('estatus',$status);
    }
    public function getEmailOfSeller($businessId){
        return UserRepository::where('bussine_id',$businessId)->first();
    }
}
