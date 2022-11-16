<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanServicio extends Model
{
    use HasFactory;

    protected $table = 'plan_domo_servicio';

    protected $fillable = ['plan_id', 'servicio_id'];

    public $timestamps = false;
}
