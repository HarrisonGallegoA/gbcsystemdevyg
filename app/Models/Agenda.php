<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = [
        'fechainicio','fechafinal','horainicio','horafinal','idDomo'

    ];
    public $timestamps = false;

    /**
     * Get the domo that owns the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domo(): BelongsTo
    {
        return $this->belongsTo(Domo::class, 'idDomo');
    }

    /**
     * Get the user associated with the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function domo2()
    {
        return $this->hasOne(User::class, 'idDomo', 'id');
    }

}
