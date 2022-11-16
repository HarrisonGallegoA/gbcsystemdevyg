<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /* use HasFactory; */
    protected $table = 'plan';

    protected $fillable = ['nombre', 'descripcion', 'precioplan', 'totalservicio', 'totalplan', 'estado', 'domo_id'];

    public $timestamps = false;
}
