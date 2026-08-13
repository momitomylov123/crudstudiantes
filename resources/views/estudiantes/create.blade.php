@extends('layouts.app')
@section('title', 'Nuevo Estudiante')
@section('content')
<div class="card p-4">
    <h3>➕ Nuevo Estudiante</h3>
    <form action="{{ route('estudiantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required></div>
        <div class="mb-3"><label class="form-label">Apellido</label><input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required></div>
        <div class="mb-3"><label class="form-label">DNI</label><input type="text" name="dni" class="form-control" value="{{ old('dni') }}" required></div>
        <div class="mb-3"><label class="form-label">Fecha Nacimiento</label><input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required></div>
        <div class="mb-3"><label class="form-label">Foto</label><input type="file" name="foto_perfil" class="form-control" accept="image/*"></div>
       <div class="mb-3">
    <label class="form-label">Curso</label>
    <select name="curso_id" class="form-control">
        <option value="">Seleccionar Curso</option>

        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}">
                {{ $curso->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <strong>PRECEPTORES RECIBIDOS:</strong>
    {{ $preceptores->count() }}
</div>

<div class="mb-3">
    <label class="form-label">Preceptor</label>
    <select name="preceptor_id" class="form-control">
        <option value="">Seleccionar Preceptor</option>

        @foreach($preceptores as $preceptor)
            <option value="{{ $preceptor->id }}">
                {{ $preceptor->nombre }} {{ $preceptor->apellido }}
            </option>
        @endforeach
    </select>
</div>
        <button type="submit" class="btn btn-success">💾 Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection