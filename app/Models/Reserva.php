<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';

    protected $fillable = ['fechareserva', 'fechainicio','fechafinal','fechapagoparcial' ,'totalservicio','pagoparcial', 'totalpagoparcial','estado', 'domo_id','id_plan','user_id',];

    public $timestamps = false;
}
