<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categoria extends Model
{
    public function boletines()
    {
        return $this->belongsToMany('App\Boletin')
                    ->withPivot('observacion');
    }
}
