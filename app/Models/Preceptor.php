<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Preceptor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}