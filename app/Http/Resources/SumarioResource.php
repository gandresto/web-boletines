<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SumarioResource extends JsonResource
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
            'id' => $this->id,
            'sumario' => $this->contenido
        ];
    }
}
