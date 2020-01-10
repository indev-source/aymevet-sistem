<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAPI;
use Auth;
use Carbon\Carbon;
class UserAPIController extends Controller
{
    public function register(Request $request){
        $user = new UserAPI();
        $request['password'] = bcrypt($request->password);
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $user = $user->store($request->all());
        return response()->json('0',200);
    }

    public function login(Request $request){
        //return $request;
        $request->validate([
            'email'       => 'required|string',
            'password'    => 'required|string',
        ]);       
        
    }
}
