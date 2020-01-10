<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAPI extends Model
{
    protected $table = 'usersapi';
    protected $fillable = [
        'name', 'email', 'password','first_name','rol','updated_at','created_at',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function store($request){
        return UserAPI::create($request);
    }
}
