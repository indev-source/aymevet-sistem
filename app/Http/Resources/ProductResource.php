<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=>$this->nombre,
            'price1'=>$this->precio1,
            'price2'=>$this->precio2,
            'price3'=>$this->precio3,
            'stock'=>$this->existencia,
            'categoria'=>$this->categoria->nombre,
            'ruta'=>$this->sucursal->nombre,
            'marca'=>$this->marca->nombre,
            'stock'=>$this->existencia
        ];
    }
}
