<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $paginador = parent::toArray($request);
        return [
            'data' => $paginador['data'],
            'meta' => [
                'current_page' => $paginador['current_page'],
                'from' => $paginador['from'],
                'last_page' => $paginador['last_page'],
                'path' => $paginador['path'],
                'per_page' => $paginador['per_page'],
                'to' => $paginador['to'],
                'total' => $paginador['total']
            ],
            'links' => [
                'first' => $paginador['first_page_url'],
                'last' => $paginador['last_page_url'],
                'prev' => $paginador['prev_page_url'],
                'next' => $paginador['next_page_url']
            ],
        ];
    }
}
