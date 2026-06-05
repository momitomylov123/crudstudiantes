<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Estudiantes')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('estudiantes.index') }}">📚 Gestión de Estudiantes</a>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
body {
    background: linear-gradient(135deg, #ffe1ed, #f3c2d7, #e77bb1);
    font-family: 'Comic Sans MS', cursive, sans-serif;
    color: #5d3750;
}

.navbar {
    background: linear-gradient(to right, #ffb6c1, #ffa07a);
    border-bottom: 3px solid #eb8bbb;
}

.navbar-brand {
    color: #b33875 !important;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(92, 12, 61, 0.3);
}

.container {
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(255, 182, 193, 0.3);
    border: 2px solid #ffb6c1;
}

.alert-success {
    background-color: #e6f7e6;
    border-color: #e6b8cf;
    color: #2d5016;
    border-radius: 10px;
}

.alert-danger {
    background-color: #fce4e4;
    border-color: #f5c2c2;
    color: #721c24;
    border-radius: 10px;
}

.btn {
    border-radius: 20px;
    background: linear-gradient(to right, #ffb6c1, #ffa07a);
    border: none;
    color: white;
    font-weight: bold;
}

.btn:hover {
    background: linear-gradient(to right, #ff69b4, #ff4500);
    transform: scale(1.05);
}
</style>