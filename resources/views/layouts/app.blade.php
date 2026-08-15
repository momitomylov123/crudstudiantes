<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'CRUD Estudiantes')</title>

    {{-- AdminLTE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- Estilos específicos de cada vista --}}
    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    {{-- NAVBAR --}}
    <nav class="app-header navbar navbar-expand bg-body">

        <div class="container-fluid">

            {{-- Botón menú --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
            </ul>

            {{-- Nombre --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link fw-bold">
                        📚 Gestión de Estudiantes
                    </span>
                </li>
            </ul>

        </div>

    </nav>


    {{-- SIDEBAR --}}
    <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">

        {{-- Logo --}}
        <div class="sidebar-brand">

            <a href="{{ route('dashboard') }}" class="brand-link">

                <span class="brand-text fw-light">
                    📚 Estudiantes
                </span>

            </a>

        </div>


        {{-- Menú --}}
        <div class="sidebar-wrapper">

            <nav class="mt-2">

                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                >

                    <li class="nav-item">

                        <a href="{{ route('dashboard') }}" class="nav-link">

                            <i class="nav-icon bi bi-speedometer2"></i>

                            <p>Panel de Estudiantes</p>

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="{{ route('estudiantes.index') }}" class="nav-link">

                            <i class="nav-icon bi bi-people-fill"></i>

                            <p>Estudiantes</p>

                        </a>

                    </li>


                    <li class="nav-item">

                        <a href="{{ route('estudiantes.create') }}" class="nav-link">

                            <i class="nav-icon bi bi-person-plus-fill"></i>

                            <p>Nuevo estudiante</p>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </aside>


    {{-- CONTENIDO PRINCIPAL --}}
    <main class="app-main">

        <div class="app-content">

            <div class="container-fluid py-4">


                {{-- Mensaje de éxito --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif


                {{-- Errores --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- Contenido de cada vista --}}
                @yield('content')


            </div>

        </div>

    </main>


    {{-- FOOTER --}}
    <footer class="app-footer">

        <div class="float-end d-none d-sm-inline">
            CRUD Estudiantes
        </div>

        <strong>
            Proyecto Laravel + AdminLTE
        </strong>

    </footer>

</div>


{{-- Scripts generales --}}
@stack('scripts')

</body>
</html>