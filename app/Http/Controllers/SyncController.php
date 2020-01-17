<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class SyncController extends Controller
{
    public function syncMenu(){
       
        
        return view('sincronizacion.menu');
    }
}
