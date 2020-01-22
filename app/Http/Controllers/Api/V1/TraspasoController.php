<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\TraspasoRepository;
use DB;
class TraspasoController extends Controller{
    
    public function products($traspasoId){
        $traspaso = TraspasoRepository::findOrFail($traspasoId);
        $products = DB::table('traspasos')->join('producto_traspasos','traspasos.id','producto_traspasos.traspaso_id')
        ->join('inventarios','producto_traspasos.producto_id','inventarios.id')
        ->join('marcas','inventarios.marca_id','marcas.id')
        ->select('inventarios.id','inventarios.nombre','inventarios.precio1','inventarios.precio2','inventarios.precio3','marcas.nombre as marca')
        ->get();
        return response()->json($products,200);
    }
}
