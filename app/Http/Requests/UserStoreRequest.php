<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:100',
            'celular'=>'required|max:10',
            'email'=>'required',
            'password'=>'required|min:8',
            'rol'=>'required',
            'bussine_id'=>'required',
            'comision'=>'required',
        ];
    }
}
