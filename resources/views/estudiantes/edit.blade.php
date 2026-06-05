@extends('layouts.app')
@section('title', 'Editar Estudiante')
@section('content')
<div class="card p-4">
    <h3>✏️ Editar Estudiante</h3>
    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required></div>
        <div class="mb-3"><label class="form-label">Apellido</label><input type="text" name="apellido" class="form-control" value="{{ old('apellido', $estudiante->apellido) }}" required></div>
        <div class="mb-3"><label class="form-label">DNI</label><input type="text" name="dni" class="form-control" value="{{ old('dni', $estudiante->dni) }}" required></div>
        <div class="mb-3"><label class="form-label">Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento->format('Y-m-d')) }}" required></div>
        <div class="mb-3"><label class="form-label">Foto</label><input type="file" name="foto_perfil" class="form-control" accept="image/*">
            @if($estudiante->foto_perfil)<img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" width="80" class="mt-2 rounded">@endif
        </div>
        <button type="submit" class="btn btn-warning">🔄 Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection