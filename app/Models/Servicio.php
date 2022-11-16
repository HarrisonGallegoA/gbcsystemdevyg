<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    /* protected $guarded = []; */
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = ['nombre', 'descripcion', 'precio',
                           'tiempo', 'estado'];

    public $timestamps = false;
}
