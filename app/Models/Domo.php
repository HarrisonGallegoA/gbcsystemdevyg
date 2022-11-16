<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domo extends Model
{
     use HasFactory; 

    protected $table = 'domo';

    protected $fillable = ['nombre', 'descripcion', 'capacidad', 'numerobaños', 'tipodomo', 'estado'];

    public $timestamps = false;
}
