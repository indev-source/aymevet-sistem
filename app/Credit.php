<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected  $table =  'creditos';
    protected $primaryKey =  'id';
    protected $fillable = ['user','client','date'];

    public function lender(){
        return $this->belongsTo('App\User','user');
    }
    public function customer(){
        return $this->belongsTo('App\Cliente','client');
    }
    public function scopeCredits($query,$user){
        if($user->rol == 'administrador')
            return $query->allCredits();
        return $query->yourCredits($user->id);
    }
    public function scopeAllCredits($query){ return $query->orderBy('id','desc'); }
    public function scopeYourCredits($query,$userID){ return $query->where('u ser',$userID); }
    public function scopeOrderDate($query){ return $query->orderBy('date','desc'); }
}
