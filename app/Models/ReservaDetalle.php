<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaDetalle extends Model
{
    use HasFactory;
    protected $table = 'reserva_detalle';

    protected $fillable = ['servicio_id','reserva_id'];

    public $timestamps = false;
}
