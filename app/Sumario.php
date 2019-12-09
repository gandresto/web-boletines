<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumario extends Model
{
    protected $table = 'sumarios';
    public $timestamps = false;

    public function boletin()
    {
        return $this->belongsTo('App\Boletin');
    }
}
