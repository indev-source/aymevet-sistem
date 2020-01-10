<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'attributes'=>[
                'fullname'=>$this->nombre_completo,
                'email'=>$this->email,
                'phone'=>$this->telefono,
                'address'=>$this->direccion
            ]
        ];
    }
}
