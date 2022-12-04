<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';

    protected $fillable = ['user_id', 'id_plan','domo_id','pagoparcial' ,'totalpagoparcial','fechareserva', 'fechainicio','fechafinal','fechapagoparcial','totalservicio','estado'];

    public $timestamps = false;
}
