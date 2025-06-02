<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probador extends Model
{
    /** @use HasFactory<\Database\Factories\ProbadorFactory> */
    use HasFactory;

    protected $table = 'probadores';
    protected $fillable = ['vueltas'];

    public function piloto()
    {
        return $this->morphOne(Piloto::class, 'asignable');
    }
}
