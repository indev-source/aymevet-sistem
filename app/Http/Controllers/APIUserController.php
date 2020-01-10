<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
class APIUserController extends Controller
{
    public function login(Request $request){
        try{
            $user = null;
            $data = null;
            if(Auth::attempt(['email'=> $request['email'] , 'password' => $request->password])){
                $user = User::login($request);
                $data = array(
                    'user'=>$user,
                    'auth'=>true
                );
            }else{
                $data = array(
                    'user'=>$user,
                    'auth'=>false
                );
            }
            return response()->json($data);
        }catch(Exception $e){

        }
    }
}
