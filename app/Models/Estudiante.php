<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'foto_perfil',
        'curso_id',
        'preceptor_id',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function preceptor()
    {
        return $this->belongsTo(Preceptor::class);
    }
}