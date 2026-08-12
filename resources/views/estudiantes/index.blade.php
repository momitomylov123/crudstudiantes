@extends('layouts.app')
@section('title', 'Listado')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📋 Estudiantes</h2>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">➕ Nuevo</a>
<a href="{{ route('dashboard') }}" class="btn btn-primary">
    📊 Ir al panel de estudiantes
</a>


</div>
<table class="table table-striped align-middle">
    <thead class="table-dark">
        <tr><th>Foto</th><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Nacimiento</th><th>Acciones</th></tr>
    </thead>
    <tbody>
        @forelse($estudiantes as $est)
        <tr>
            <td>
                @if($est->foto_perfil)
                    <img src="{{ asset('storage/' . $est->foto_perfil) }}" width="45" height="45" class="rounded-circle object-fit-cover">
                @else 👤 @endif
            </td>
            <td>{{ $est->nombre }}</td>
            <td>{{ $est->apellido }}</td>
            <td>{{ $est->dni }}</td>
            <td>{{ $est->fecha_nacimiento->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('estudiantes.edit', $est) }}" class="btn btn-sm btn-warning">✏️</a>
                <form action="{{ route('estudiantes.destroy', $est) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar a {{ $est->nombre }} {{ $est->apellido }}?')">🗑️</button>
                </form>
            </td>
            <td>
    <a href="{{ route('estudiantes.show', $est) }}" class="btn btn-sm btn-info me-1">👁️ Ver</a>
    
    <a href="{{ route('estudiantes.edit', $est) }}" class="btn btn-sm btn-warning me-1">✏️</a>
    <form action="{{ route('estudiantes.destroy', $est) }}" method="POST" class="d-inline">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar a {{ $est->nombre }} {{ $est->apellido }}?')">🗑️</button>
    </form>
</td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay estudiantes registrados.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
