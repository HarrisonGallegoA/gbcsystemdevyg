<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domo extends Model
{
     use HasFactory;

    protected $table = 'domo';

    protected $fillable = ['nombre', 'descripcion', 'capacidad', 'numerobaños', 'tipodomo', 'estado'];

    public $timestamps = false;

    /**
     * Get all of the agendas for the Domo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }
}
