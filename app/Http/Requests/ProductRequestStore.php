<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required',
            'codigo'=>'required',
            'existencia'=>'required',
            'costo'=>'required',
            'porcentaje1'=>'required',
            'porcentaje2'=>'required',
            'porcentaje3'=>'required',
            'precio1'=>'required',
            'precio2'=>'required',
            'precio3'=>'required',
            'bussine_id'=>'required',
            'categoria_id'=>'required',
            'clave_unidad'=>'required',
            'clave_producto'=>'required',
            'lote'=>'required',
            'ieps'=>'required',
            'descripcion'=>'required',
            'marca_id'=>'required',
            'proveedor_id'=>'required'
        ];
    }
}
