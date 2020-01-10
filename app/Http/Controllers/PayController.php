<?php

namespace App\Http\Controllers;

use App\models\CreditRepository;
use App\models\PayRepository;
use App\models\SaleRepository;
use Illuminate\Http\Request;
use Auth;
class PayController extends Controller
{
    public function prepareDataToAddSale($data){
        return array(
            'total'=>$data->pago,
            'vendedor'=>Auth::user()->id,
            'sucursal'=>Auth::user()->bussine_id,
            'fecha'=>now(),
            'tipo_venta'=>'contado',
            'cliente'=>$data->cliente,
            'estatus'=>'terminado'
        );
    }
    public function store(Request $request, PayRepository $pay, SaleRepository $saleObj, CreditRepository $creditObj){
        try{
            $saleObj->createSaleHowPayCredit($this->prepareDataToAddSale($request));
            $pay->addPay($request->all());
            if($creditObj->isCreditCompleted($request->credito))
                $creditObj->creditCompleted($request->credito);
            return redirect('administrador/creditos/'.$request->credito)->with('status_success','Pago agregado correctamente');
        }catch(\Exception $e){
            return back()->with('status_warning',$e->getMessage());
        }
    }
}
