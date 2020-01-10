<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRelationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'categoria'=>$this->categoria->nombre,
            'ruta'=>$this->sucursal->nombre,
            'marca'=>$this->marca->nombre
        ];
    }
}
