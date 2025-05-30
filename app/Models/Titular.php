<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
    /** @use HasFactory<\Database\Factories\TitularFactory> */
    use HasFactory;

    protected $table = 'titulares';
}
