@extends('layouts.app')

@section('title', 'Detalle del Estudiante')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>📄 Detalle del Estudiante</h3>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">⬅️ Volver al Listado</a>
    </div>

    <div class="row">
        <!-- Columna Foto -->
        <div class="col-md-4 text-center mb-4 mb-md-0">
            @if($estudiante->foto_perfil)
                <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" 
                     class="img-fluid rounded shadow" 
                     style="max-height: 280px; object-fit: cover;">
            @else
                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                     style="width: 200px; height: 200px; font-size: 5rem;">
                    👤
                </div>
            @endif
        </div>

        
        <div class="col-md-8">
            <table class="table table-borderless">
                <tr>
                    <th class="text-muted" style="width: 200px;">Nombre completo:</th>
                    <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                </tr>
                <tr>
                    <th class="text-muted">DNI:</th>
                    <td>{{ $estudiante->dni }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Fecha de Nacimiento:</th>
                    <td>{{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Registrado el:</th>
                    <td>{{ $estudiante->created_at->format('d/m/Y \a \l\a\s H:i') }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Última actualización:</th>
                    <td>{{ $estudiante->updated_at->format('d/m/Y \a \l\a\s H:i') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">✏️ Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection