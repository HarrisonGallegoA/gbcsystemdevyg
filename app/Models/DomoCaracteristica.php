<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class DomoCaracteristica extends Model
{
     use HasFactory; 

    protected $table = 'domo_caracteristica';

    protected $fillable = ['domo_id', 'caracteristica_id', 'cantidad'];

    public $timestamps = false;
}
