<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\User;
class APIClientController extends Controller
{
    public function clients($userID){
        $user = User::find($userID);
        $client = Cliente::clients($user)->get();
        return response()->json($client);
    }

    public function store(Request $request, $id){
        $data = null;
        try{
            $request['vendedor_id'] = $id;
            $client = new Cliente();
            $client->store($request->all());
            $msj = "El cliente fue agregado correctamente";
            $data = array(
                'msj'=>$msj,
                'consulta'=>true
            );
            return response()->json($data);
        }catch(Exception $e){
            $data = array(
                'msj'=>$e->getMessage(),
                'consulta'=>false
            );
            return response()->json($data);
        }
    }
}
