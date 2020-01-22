<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\SaleRepository;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }
    public function index()
    {
        // ganancias totales
        $total     = SaleRepository::sales('contado')->totalSales();
        $inversion = SaleRepository::sales('contado')->inversion();
        $ganancias = SaleRepository::ganancias($total,$inversion);

        //ganancias del día
        $total        = SaleRepository::sales('contado')->salesToday()->totalSales();
        $inversion    = SaleRepository::sales('contado')->salesToday()->inversion();
        $gananciasHoy = SaleRepository::ganancias($total,$inversion);

        $sales = SaleRepository::select('fecha', DB::raw('COUNT(*) as count, sum(total) as total'))
        ->where('estatus','pagado')
        ->where('tipo_venta','contado')
        ->groupBy('fecha')
        ->orderBy('fecha', 'asc')
        ->paginate(15);

        return view('welcome',compact('ganancias','gananciasHoy','sales'));
    }
}
