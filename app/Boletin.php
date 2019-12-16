<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    protected $table = 'boletines';
    public $timestamps = false;

    public function sumarios()
    {
        return $this->hasMany('App\Sumario');
    }

    public function categorias()
    {
        return $this->belongsToMany('App\Categoria')
                    ->withPivot('descripcion');;
    }

}
