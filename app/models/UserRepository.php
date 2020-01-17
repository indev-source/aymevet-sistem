<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserRepository extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','celular','email','password','rol','bussine_id','created_at'];

    public function business(){
        return $this->belongsTo('App\models\BusinessRepository','bussine_id');
    }
    public function createUser($data){
        return UserRepository::create($data);
    }
    public function editUser($data){
        return $this->fill($data)->save();
    }
    public function editPassword($password){
        $this->password = $password;
        return $this->save();
    }
    public function scopeUsers($query,$status){
        return $query->where('status',$status);
    }
    public function scopeSellers($query){
        return $query->where('rol','vendedor');
    }
}
