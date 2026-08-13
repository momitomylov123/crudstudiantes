@extends('layouts.app')

@section('title', 'Ver Estudiante')

@section('content')
<div class="card p-4">
    <h3>👤 Datos del Estudiante</h3>

    @if($estudiante->foto_perfil)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}"
                 width="150"
                 class="rounded">
        </div>
    @endif

    <div class="mb-3">
        <strong>Nombre:</strong>
        {{ $estudiante->nombre }}
    </div>

    <div class="mb-3">
        <strong>Apellido:</strong>
        {{ $estudiante->apellido }}
    </div>

    <div class="mb-3">
        <strong>DNI:</strong>
        {{ $estudiante->dni }}
    </div>

    <div class="mb-3">
        <strong>Fecha de nacimiento:</strong>
        {{ $estudiante->fecha_nacimiento->format('d/m/Y') }}
    </div>

    <div class="mb-3">
        <strong>Curso:</strong>
        {{ $estudiante->curso ? $estudiante->curso->nombre : 'Sin curso asignado' }}
    </div>

    <div class="mb-3">
        <strong>Preceptor:</strong>
        {{ $estudiante->preceptor ? $estudiante->preceptor->nombre . ' ' . $estudiante->preceptor->apellido : 'Sin preceptor asignado' }}
    </div>

    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">
        ✏️ Editar
    </a>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
        ↩️ Volver
    </a>
</div>
@endsection