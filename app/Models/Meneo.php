<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meneo extends Model
{
    /** @use HasFactory<\Database\Factories\MeneoFactory> */
    use HasFactory;

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }
}
