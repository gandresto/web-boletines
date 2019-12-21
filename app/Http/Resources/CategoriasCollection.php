<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriasCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Definir funciones
        $esPerio = function($cat){
            return $cat['tipo'] == 'periodística';
        };
        $esPersua = function($cat){
            return $cat['tipo'] == 'persuasión';
        };
        $quitarTipo = function($cat){
            return array(
                'id' => $cat['id'],
                'nombre' => $cat['nombre'],
            );
        };

        // Filtrar datos
        $arr = parent::toArray($request);
        $persuasivas = array_filter($arr, $esPersua);
        $periodisticas = array_filter($arr, $esPerio);

        // Remapear arreglo
        return array(
            'persuasivas' => array_map($quitarTipo, $persuasivas),
            'periodisticas' => array_map($quitarTipo, $periodisticas),
        );
        // return parent::toArray($request);
        // return array_map(function($categoria){
        //     return array(
        //         'id' => $categoria['id'],
        //         'categoria' => $categoria['nombre'],
        //         'tipo' => $categoria['tipo'],
        //     );
        // }, parent::toArray($request));
    }
}
