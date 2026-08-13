<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::latest()->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
{
    $cursos = \App\Models\Curso::all();
    $preceptores = \App\Models\Preceptor::all();

    return view('estudiantes.create', compact('cursos', 'preceptores'));
}
    
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre'           => 'required|string|max:255',
        'apellido'         => 'required|string|max:255',
        'dni'              => 'required|string|unique:estudiantes,dni',
        'fecha_nacimiento' => 'required|date',
        'foto_perfil'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'curso_id'         => 'nullable|exists:cursos,id',
        'preceptor_id'     => 'nullable|exists:preceptors,id',
    ]);

    if ($request->hasFile('foto_perfil')) {
        $file = $request->file('foto_perfil');
        $filename = time() . '_' . $file->getClientOriginalName();
        $validated['foto_perfil'] = $file->storeAs(
            'fotos_perfil',
            $filename,
            'public'
        );
    }

    Estudiante::create($validated);

    return redirect()
        ->route('estudiantes.index')
        ->with('success', 'Estudiante creado correctamente.');
}

    public function show(Estudiante $estudiante)
{
    return view('estudiantes.show', compact('estudiante'));
}

    public function edit(Estudiante $estudiante)
{
    $cursos = \App\Models\Curso::all();
    $preceptores = \App\Models\Preceptor::all();

    return view('estudiantes.edit', compact(
        'estudiante',
        'cursos',
        'preceptores'
    ));
}

    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'dni'              => 'required|string|unique:estudiantes,dni,' . $estudiante->id,
            'fecha_nacimiento' => 'required|date',
            'foto_perfil'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'curso_id'         => 'nullable|exists:cursos,id',
            'preceptor_id'     => 'nullable|exists:preceptors,id',
        ]);

        if ($request->hasFile('foto_perfil')) {
            if ($estudiante->foto_perfil) {
                Storage::disk('public')->delete($estudiante->foto_perfil);
            }

            $file = $request->file('foto_perfil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['foto_perfil'] = $file->storeAs('fotos_perfil', $filename, 'public');
        }

        $estudiante->update($validated);
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        if ($estudiante->foto_perfil) {
            Storage::disk('public')->delete($estudiante->foto_perfil);
        }

        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}