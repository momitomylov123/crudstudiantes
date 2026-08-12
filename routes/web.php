<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Models\Estudiante;

Route::get('/dashboard', function () {
    $totalEstudiantes = Estudiante::count();
    $ultimosEstudiantes = Estudiante::latest()->take(5)->get();
    $estudianteMayor = Estudiante::orderBy('fecha_nacimiento', 'asc')->first(); 
    $estudianteMenor = Estudiante::orderBy('fecha_nacimiento', 'desc')->first();

    return view('dashboard', compact(
        'totalEstudiantes',
        'ultimosEstudiantes',
        'estudianteMayor', 
        'estudianteMenor'
    ));
})->name('dashboard');

Route::resource('estudiantes', EstudianteController::class);

Route::redirect('/', '/dashboard');