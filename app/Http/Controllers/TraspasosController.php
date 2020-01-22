<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Traspaso;
use App\Bussine;
use App\Product;
use App\ProductoTraspaso;
use DB;
use Auth;
use App\User;

use App\models\TraspasoRepository;
use App\models\BusinessRepository;
use App\models\ProductRepository;
use App\models\ProductTraspasoRepository;
class TraspasosController extends Controller{

    public function __construct(TraspasoRepository $traspaso, ProductRepository $product,ProductTraspasoRepository $productTraspaso){
        $this->traspaso = $traspaso;
        $this->product  = $product;
        $this->productTraspaso = $productTraspaso;
        $this->middleware('userRol')->except(['create','storeProducts','finishTransfer']);
    }
    public function getTraspasoById($transferId){
        return $this->traspaso->findOrFail($transferId);
    }
    public function addProductsToBusiness($products,$busineId){
        foreach($products as $productToTransfer){
            $product = ProductRepository::findOrFail($productToTransfer->product_id);
            $product->bussine_id = $busineId;
            $product->existencia = $productToTransfer->cantidad;
            
            $isRegisterProduct = ProductRepository::where('bussine_id',$busineId)->where('codigo',$product->codigo)->first();
            
            if((boolean) $isRegisterProduct){
                $isRegisterProduct->existencia += $productToTransfer->cantidad;
                $isRegisterProduct->save();
            }else{
                ProductRepository::create($product->toArray());
            }
            
            $product = ProductRepository::findOrFail($productToTransfer->product_id);
            $product->existencia -= $productToTransfer->cantidad;
            $product->save();
        }
    }
    public function index(Request $request){
        $traspasos = $this->traspaso->traspasos()->getByStatus($request->estatus)->get();
        return view('traspasos.index',compact('traspasos'));
    }
    public function create(){
        $traspasoId = \Session::get('traspasoId');
        $traspaso    = $this->traspaso->getOrCreateTraspaso($traspasoId);
        \Session::put('traspasoId',$traspaso->id);

        $productsInTransfers = $traspaso->products()->get();

        $products = $this->product->getProducts('activos')->business(Auth::user()->bussine_id)->get();
        return view('traspasos.create',['business'=>BusinessRepository::all(),'products'=>$products,'productsInTransfers'=>$productsInTransfers]);
    }
    public function storeProducts(Request $request){
       
        $traspasoId = \Session::get('traspasoId');

        //actualizar el request con el traspaso creado u obtenido
        $request['traspaso_id'] = $traspasoId;

        //verificar que el producto esta en el traspaso
        $product = $this->productTraspaso->isTheProductInTransfer($request->producto_id);

        if($product)
            $product->editProductIntransfer($request->all());
        else
            $this->productTraspaso->addProduct($request->all());
        
        alert()->success('El producto fue agregado exitosamente');
        
        return back();
    }
    public function finishTransfer(Request $request){
        $transferId = \Session::get('traspasoId');
        $traspaso = $this->getTraspasoById($transferId);
        $traspaso->finish($request->sucursal_id);
        alert()->success('El traspasos fue enviado exitosamente');
        \Session::remove('traspasoId');
        return redirect('/traspasos');
    }
    public function show($traspasoId){
        $traspaso =  $this->traspaso->getOrCreateTraspaso($traspasoId);
        $products =  $traspaso->products()->get();
        return view('traspasos.show',compact('traspaso','products'));
    }
    public function autorizar(Request $request,$traspasoId){
        $traspaso =  $this->getTraspasoById($traspasoId);
        $products = $traspaso->products()->get();

        $this->addProductsToBusiness($products,$traspaso->sucursal_id);
        $traspaso->autorizar();
        alert()->success('El traspaso fue autorizado exitosamente');
        return back();
    }
    public function store(Request $request){
        $traspaso = new Traspaso;
        $traspaso->envia = Auth::user()->bussine_id;
        $traspaso->usuario_id = Auth::user()->id;
        $traspaso->recibe     = $request->bussine_id;
        $traspaso->razon = "-----------";
        $traspaso->estatus = "proceso";
        $traspaso->save();
        return redirect('dashboard/seleccionar-productos/'.$traspaso->id);
    }
    public function productsSelect($traspaso_id){
        $products = Product::products()->byBussine()->get();
        $traspaso = Traspaso::find($traspaso_id);
        $productsTraspaso = ProductoTraspaso::products($traspaso_id)->get();
        return view('traspasos.create',compact('products','traspaso','productsTraspaso'));
    }
    public function terminar(Request $request){
        $traspaso = Traspaso::find($request->traspaso_id);
        $traspaso->estatus = "enviado";
        $traspaso->save();
        return redirect('dashboard/v/admin/traspasos');
    }
    public function aceptar(Request $request,$traspasoID){
        $traspaso = Traspaso::findOrFail($traspasoID);
        $traspaso->estatus = 'aceptado';
        $traspaso->save();
        return back();
    }
    public function reporte_traspaso($traspasoID){
        $traspaso = Traspaso::find($traspasoID);
        $products = ProductoTraspaso::products($traspaso->id)->get();
        $pdf = \App::make('dompdf.wrapper');
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title>Reporte de traspaso</title>
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
                        <img src="https://aymevet.com/logo.jpeg">
                    </div>
                    <h1>'.$traspaso->created_at.'</h1>
                    <div id="company" class="clearfix">
                        <div>Company Name</div>
                        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                        <div>(602) 519-0450</div>
                        <div><a href="mailto:company@example.com">company@example.com</a></div>
                    </div>
                    <div id="project">
                        <div><span>REPORTE</span> REPORTE DE TRASPASO</div>
                        <div><span>USUARIO</span> '.Auth::user()->name.'</div>
                        <div><span>SUCURSAL</span> '.Auth::user()->bussine->nombre.'</div>
                        <div><span>FECHA</span> '.$traspaso->created_at->diffForHumans().'</div>
                        <div><span>Sucursal(envia): </span> '.$traspaso->senvia->nombre.'</div>
                        <div><span>Sucursal(recibe): </span> '.$traspaso->srecibe->nombre.'</div>
                        <div><span>Usuario(envia): </span> '.$traspaso->usuario->name.'</div>
                        <div><span>Estatus: </span> '.$traspaso->estatus.'</div>
                        <div><span>Total de productos: </span> '.$products->count().'</div>
                    </div>
                </header>
                <main>
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align:center;">PRODUCTO</th>
                                <th style="text-align:center;">p1</th>
                                <th style="text-align:center;">p2</th>
                                <th style="text-align:center;">p3</th>
                                <th style="text-align:center;">CANTIDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
                    foreach ($products as $key) {
                        $html .= '
                            <tr>
                                <td style="text-align:center;">'.$key->product->nombre.'</td>
                                <td style="text-align:center;">$'.number_format($key->product->precio1,2,'.',',').'</td>
                                <td style="text-align:center;">$'.number_format($key->product->precio2,2,'.',',').'</td>
                                <td style="text-align:center;">$'.number_format($key->product->precio3,2,'.',',').'</td>
                                <td style="text-align:center;">'.$key->cantidad.'</td>
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
    public function regresar(Request $request){
        $traspaso = Traspaso::find($request->traspaso_id);
        $producto_traspasos = ProductoTraspaso::where('traspaso_id',$traspaso->id)->get();

        foreach ($producto_traspasos as $key) {

            $producto = Product::find($key->producto_id);
            $producto->existencia = ($key->cantidad * 2);
            $producto->save();
        }
    }
}
