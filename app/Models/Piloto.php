<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    /** @use HasFactory<\Database\Factories\PilotoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'nacionalidad', 'nacimiento'];

    public function asignable()
    {
        return $this->morphTo(Piloto::class, 'asignable');
    }
}
