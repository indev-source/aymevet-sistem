<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use App\Sale;
use Auth;
use Carbon\Carbon;
use App\Order;
use App\ProductOrder;
use App\Bussine;
use App\Product;
use DB;
use App\User;
use App\Cliente;
use App\Credit;

use App\models\SaleRepository;
use App\models\CustomerRepository;
use App\models\CreditRepository;
class SalesController extends Controller{

    public function __construct(SaleRepository $sales){

        $this->middleware('auth',['except'=>'sincronizar']);
        $this->sales = $sales;
    }
    public function sales(){
        return $this->sales->sales('contado');
    }

    public function getSaleById($saleId){
        return $this->sales->findOrFail($saleId);
    }
    public function sincronizar(Request $request,$sellerEmail){
        return response()->json($request,201);

    }
    public function index(){
        $sales = $this->sales()->get();
        return view('sales.index',['sales'=>$sales,'msg'=>'Ventas generales']);
    }
    public function customer(Request $request){
        $sales = $this->sales()->customers($request->cliente)->get();
        return view('sales.index',['sales'=>$sales,'msg'=>'Ventas por cliente']);
    }
    public function toSell(){
        $saleId = \Session::get ('orderID');
        $sale   = $this->sales->getOrCreateSale($saleId);
        \Session::put('orderID',$sale->id);
        $products  =  $sale->products()->get();
        if(Auth::user()->rol == 'administrador')
            $customers = CustomerRepository::getCustomers()->get();
        else
            $customers = CustomerRepository::getCustomersBySeller(Auth::user()->id)->get();
        $total     = $sale->total();
        return view('sales.vender',compact('products','sale','customers','total'));
    }
    public function store(Request $request, CreditRepository $credit){

        $saleId = \Session::get ('orderID');

        $sale = $this->getSaleById($saleId);
        
        $sale->total = $sale->total();
        $sale->tipo_venta = $request->tipo_venta;
        $sale->estatus    = "pagado";
        $sale->cliente    = $request->cliente;
        $sale->save();

        $sale->removeStock($sale->products()->get());

        if($request->tipo_venta == 'credito')
            $credit->createCredit($sale->id);

        \Session::remove('orderID');

        return redirect('/vender');
    }
    public function ticketSale(Request $request){
        $bussine = Bussine::find(Auth::user()->bussine_id);
        $sale = Sale::find($request->ticket);
        $order = Order::find($sale->order_id);
        $products = ProductOrder::join('inventarios','product_orders.product_id','inventarios.id')
        ->select(
            'inventarios.nombre as producto',
            'product_orders.price as precio',
            'product_orders.amount as cantidad',
            'product_orders.subtotal',
            'inventarios.codigo','product_orders.price as venta'
        )->where('product_orders.order_id',$order->id)->get();

        $total = $order->subtotal;
        $discount = 0;
        $dinDiscount = 0;
        $pay = 0;
        $porPay = 0;
        $typePay = "efectivo";
                 //tarjeta dinero que se paga de mas
        if($order->pay != 0){
            $typePay = "tarjeta";
            $total += ($order->subtotal * $order->pay)/100;
                    //porcentaje tarjeta
            $porPay = Bussine::find(Auth::user()->bussine_id)->tarjeta;
        }
                //descuento porcentaje
        if($order->discount !=0){
            $discount = $order->discount;
                    //dinero descontado
            $dinDiscount = ($order->subtotal *$order->discount)/100;
            $total -= $dinDiscount;
        }
        $subtotal = $order->subtotal;

        $user = User::find($order->user_id);
        return view('dashboard.ticket',compact(
            'sale','products','total','discount','dinDiscount','pay','porPay','typePay','bussine','subtotal','user'
        ));
    }


    public function show($saleId){
        $sale = $this->getSalebyid($saleId);
        $products = $sale->products()->get();
        return view('sales.show',compact('sale','products'));
    }
    public function destroy($id){

        $sale = $this->getSaleById($id);
        
        $sale->changeToStatus('cancelado');

        $sale->addToStock($sale->products()->get());
        
        return redirect('administrador/ventas/'.$id)->with('status_success','La venta fue actualizada correctamente');
    }

    public function reporte_venta_dia(){
        $sales = Sale::join('orders','ventas.order_id','orders.id')
        ->join('bussines','orders.bussine_id','bussines.id')
        ->join('users','orders.user_id','users.id')
        ->select(
            'ventas.id',
            'ventas.date as fecha',
            'ventas.total',
            'ventas.status',
            'users.name as vendedor',
            'bussines.nombre as bussine'
        )->where(
            [
                ['ventas.date',Carbon::now()->format('Y-m-d')],
                ['ventas.status','pagado'],
                ['orders.bussine_id',Auth::user()->bussine_id]
            ]
        )->get();

        $total_venta_dia = Sale::join('orders','ventas.order_id','orders.id')->where([['ventas.status','pagado'],['orders.bussine_id',Auth::user()->bussine_id],['ventas.date',Carbon::now()->format('Y-m-d')]])->sum('ventas.total');
        $invertido = DB::table('ventas')
        ->join('orders','ventas.order_id','orders.id')
        ->join('product_orders','orders.id','product_orders.order_id')
        ->join('inventarios','product_orders.product_id','inventarios.id')
        ->select(
            DB::raw('sum(inventarios.costo*product_orders.amount) as invercion_venta')
        )->where([['ventas.date',Carbon::now()->format('Y-m-d')],['orders.bussine_id',Auth::user()->bussine_id]])->get();

        $ganancias = $total_venta_dia - $invertido[0]->invercion_venta;

        /*$ganancias       = Sale::join('orders','ventas.order_id','orders.id')
        ->join('product_orders','orders.id','product_orders.order_id')
        ->join('inventarios','product_orders.product_id','inventarios.id')
        ->select(
            DB::raw('sum((inventarios.precio_Venta-inventarios.costo)*product_orders.amount) as ganancias')
        )->where('ventas.date',Carbon::now()->format('Y-m-d'))->get();*/

        $pdf = \App::make('dompdf.wrapper');

        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title>Reporte de ventas del dia</title>
            </head>
            <style>
                .clearfix:after {
                  content: "";
                  display: table;
                  clear: both;
                }

                a {
                  color: #5D6975;
                  text-decoration: underline;
                }

                body {


                  height: 29.7cm;
                  margin: 0 auto;
                  color: #001028;
                  background: #FFFFFF;
                  font-family: Arial, sans-serif;
                  font-size: 12px;
                  font-family: Arial;
                }

                header {
                  padding: 10px 0;
                  margin-bottom: 30px;
                }

                #logo {
                  text-align: center;
                  margin-bottom: 10px;
                }

                #logo img {
                  width: 90px;
                }

                h1 {
                  border-top: 1px solid  #5D6975;
                  border-bottom: 1px solid  #5D6975;
                  color: #5D6975;
                  font-size: 2.4em;
                  line-height: 1.4em;
                  font-weight: normal;
                  text-align: center;
                  margin: 0 0 20px 0;
                  background: url(dimension.png);
                }

                #project {
                  float: left;
                }

                #project span {
                  color: #5D6975;
                  text-align: right;
                  width: 52px;
                  margin-right: 10px;
                  display: inline-block;
                  font-size: 0.8em;
                }

                #company {
                  float: right;
                  text-align: right;
                }

                #project div,
                #company div {
                  white-space: nowrap;
                }

                table {
                  width: 100%;
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin-bottom: 20px;
                }

                table tr:nth-child(2n-1) td {
                  background: #F5F5F5;
                }

                table th,
                table td {

                }

                table th {
                  padding: 5px 20px;
                  color: #5D6975;
                  border-bottom: 1px solid #C1CED9;
                  white-space: nowrap;
                  font-weight: normal;
                }

                table .service,
                table .desc {

                }

                table td {
                  padding: 20px;

                }

                table td.service,
                table td.desc {
                  vertical-align: top;
                }

                table td.unit,
                table td.qty,
                table td.total {
                  font-size: 1.2em;
                }

                table td.grand {
                  border-top: 1px solid #5D6975;;
                }

                #notices .notice {
                  color: #5D6975;
                  font-size: 1.2em;
                }

                footer {
                  color: #5D6975;
                  width: 100%;
                  height: 30px;
                  position: absolute;
                  bottom: 0;
                  border-top: 1px solid #C1CED9;
                  padding: 8px 0;
                  text-align: center;
                }
            </style>
            <body>
                <header class="clearfix">
                    <div id="logo">
                        <img src="">
                    </div>
                     <h1>Reporte Realizado: '.Carbon::now()->format("Y-m-d").'</h1>
                    <div id="company" class="clearfix">
                        <div>Company Name</div>
                        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                        <div>(602) 519-0450</div>
                        <div><a href="mailto:company@example.com">company@example.com</a></div>
                    </div>
                    <div id="project">
                        <div><span>REPORTE</span> REPORTETE DEL DIA </div>
                        <div><span>USUARIO</span> '.Auth::user()->name.'</div>
                        <div><span>SUCURSAL</span> '.Auth::user()->bussine->nombre.'</div>
                        <div><span>FECHA</span> '.Carbon::now()->format("Y-m-d").'</div>
                        <div><span>TOTAL</span> $'.number_format($total_venta_dia,2,'.',',').'</div>
                        <div><span>INVERCIÓN</span> $'.number_format($invertido[0]->invercion_venta,2,'.',',').'</div>
                        <div><span>GANACIAS</span> $'.number_format($ganancias,2,'.',',').'</div>

                    </div>
                </header>
                <main>
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align:center;">FOLIO</th>
                                <th style="text-align:center;">Total</th>
                                <th style="text-align:center;">Sucursal</th>
                                <th style="text-align:center;">Vendedor</th>
                                <th style="text-align:center;">Fecha</th>
                                <th style="text-align:center;">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
                    foreach ($sales as $key) {
                        $html .= '
                            <tr>
                                <td style="text-align:center;">'.$key->id.'</td>
                                <td style="text-align:center;">$'.$key->total.'</td>
                                <td style="text-align:center;">'.$key->bussine.'</td>
                                <td style="text-align:center;">'.$key->vendedor.'</td>
                                <td style="text-align:center;">'.$key->fecha.'</td>
                                <td style="text-align:center;">'.$key->status.'</td>
                            </tr>
                        ';
                    }
                    $html .='
                        </tbody>
                    </table>

                </main>
            </body>
            </html>
        ';
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function reporte_fechas(Request $request){
        $sales = Sale::getSalesBetween($request->inicio,$request->final)->selectData()->byBussine()->get();
        $total_venta_dia = Sale::getSalesBetween($request->inicio,$request->final)->where('ventas.status','pagado')->byBussine()->sum('total');

        /*$ganancias = Sale::join('orders','ventas.order_id','orders.id')
        ->join('product_orders','orders.id','product_orders.order_id')
        ->join('inventarios','product_orders.product_id','inventarios.id')
        ->select(
            DB::raw('sum((inventarios.precio_Venta-inventarios.costo)*product_orders.amount) as ganancias')
        )->whereBetween('ventas.date', [$request->inicio, $request->final])->get();*/

        $invertido = DB::table('ventas')
        ->join('orders','ventas.order_id','orders.id')
        ->join('product_orders','orders.id','product_orders.order_id')
        ->join('inventarios','product_orders.product_id','inventarios.id')
        ->select(
            DB::raw('sum(inventarios.costo*product_orders.amount) as invercion_venta')
        )->where([['ventas.status','pagado'],['orders.bussine_id',Auth::user()->bussine_id]])->whereBetween('ventas.date', [$request->inicio,$request->final])->get();

        $ganancias = $total_venta_dia - $invertido[0]->invercion_venta;

        //return $invertido;
        $pdf = \App::make('dompdf.wrapper');
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title>Reporte de ventas del dia</title>
            </head>
            <style>
                .clearfix:after {
                  content: "";
                  display: table;
                  clear: both;
                }

                a {
                  color: #5D6975;
                  text-decoration: underline;
                }

                body {


                  height: 29.7cm;
                  margin: 0 auto;
                  color: #001028;
                  background: #FFFFFF;
                  font-family: Arial, sans-serif;
                  font-size: 12px;
                  font-family: Arial;
                }

                header {
                  padding: 10px 0;
                  margin-bottom: 30px;
                }

                #logo {
                  text-align: center;
                  margin-bottom: 10px;
                }

                #logo img {
                  width: 90px;
                }

                h1 {
                  border-top: 1px solid  #5D6975;
                  border-bottom: 1px solid  #5D6975;
                  color: #5D6975;
                  font-size: 2.4em;
                  line-height: 1.4em;
                  font-weight: normal;
                  text-align: center;
                  margin: 0 0 20px 0;
                  background: url(dimension.png);
                }

                #project {
                  float: left;
                }

                #project span {
                  color: #5D6975;
                  text-align: right;
                  width: 52px;
                  margin-right: 10px;
                  display: inline-block;
                  font-size: 0.8em;
                }

                #company {
                  float: right;
                  text-align: right;
                }

                #project div,
                #company div {
                  white-space: nowrap;
                }

                table {
                  width: 100%;
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin-bottom: 20px;
                }

                table tr:nth-child(2n-1) td {
                  background: #F5F5F5;
                }

                table th,
                table td {

                }

                table th {
                  padding: 5px 20px;
                  color: #5D6975;
                  border-bottom: 1px solid #C1CED9;
                  white-space: nowrap;
                  font-weight: normal;
                }

                table .service,
                table .desc {

                }

                table td {
                  padding: 20px;

                }

                table td.service,
                table td.desc {
                  vertical-align: top;
                }

                table td.unit,
                table td.qty,
                table td.total {
                  font-size: 1.2em;
                }

                table td.grand {
                  border-top: 1px solid #5D6975;;
                }

                #notices .notice {
                  color: #5D6975;
                  font-size: 1.2em;
                }

                footer {
                  color: #5D6975;
                  width: 100%;
                  height: 30px;
                  position: absolute;
                  bottom: 0;
                  border-top: 1px solid #C1CED9;
                  padding: 8px 0;
                  text-align: center;
                }
            </style>
            <body>
                <header class="clearfix">
                    <div id="logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Italika-logo.png/245px-Italika-logo.png">
                    </div>
                    <h1>Reporte Realizado: '.Carbon::now()->format("Y-m-d").'</h1>
                    <div id="company" class="clearfix">
                        <div>Company Name</div>
                        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                        <div>(602) 519-0450</div>
                        <div><a href="mailto:company@example.com">company@example.com</a></div>
                    </div>
                    <div id="project">
                        <div><span>REPORTE</span> REPORTETE POR FECHAS DEL '.$request->inicio.' al '.$request->final.'</div>
                        <div><span>USUARIO</span> '.Auth::user()->name.'</div>
                        <div><span>SUCURSAL</span> '.Auth::user()->bussine->nombre.'</div>
                        <div><span>FECHA</span> '.Carbon::now()->format("Y-m-d").'</div>
                        <div><span>TOTAL</span> $'.number_format($total_venta_dia,2,'.',',').'</div>
                        <div><span>INVERCIÓN</span> $'.number_format($invertido[0]->invercion_venta,2,'.',',').'</div>
                        <div><span>GANACIAS</span> $'.number_format($ganancias,2,'.',',').'</div>

                    </div>
                </header>
                <main>
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align:center;">FOLIO</th>
                                <th style="text-align:center;">Total</th>
                                <th style="text-align:center;">Estatus</th>
                                <th style="text-align:center;">Sucursal</th>
                                <th style="text-align:center;">Vendedor</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
                    foreach ($sales as $key) {
                        $html .= '
                            <tr>
                                <td style="text-align:center;">'.$key->ventaID.'</td>
                                <td style="text-align:center;">$'.$key->total.'</td>
                                <td style="text-align:center;">'.$key->status.'</td>
                                <td style="text-align:center;">'.$key->bussine.'</td>
                                <td style="text-align:center;">'.$key->vendedor.'</td>
                            </tr>
                        ';
                    }
                    $html .='
                        </tbody>
                    </table>

                </main>
            </body>
            </html>
        ';
        $pdf->loadHTML($html);
        return $pdf->stream();
        dd($sales);
    }
}
