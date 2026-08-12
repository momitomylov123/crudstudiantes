
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Estudiantes</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #b6b2fd;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.2);
            padding: 10px 18px;
            border-radius: 8px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .card .icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .card h3 {
            color: #666;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .card .number {
            font-size: 34px;
            font-weight: bold;
            color: #4f46e5;
        }

        .students {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .students h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            color: #666;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .empty {
            color: #777;
            padding: 20px 0;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h1>📚 Dashboard</h1>

        <a href="{{ route('estudiantes.index') }}">
            Ver estudiantes
        </a>
    </nav>

    <main class="container">

        <section class="welcome">
            <h2>Panel de estudiantes</h2>
            <p>Resumen general del sistema.</p>
        </section>

        <section class="cards">

            <div class="card">
                <div class="icon">👨‍🎓</div>
                <h3>Total de estudiantes</h3>
                <div class="number">
                    {{ $totalEstudiantes }}
                </div>
            </div>

            <div class="card">
                <div class="icon">📋</div>
                <h3>Últimos registros</h3>
                <div class="number">
                    {{ $ultimosEstudiantes->count() }}
                </div>
            </div>

<div class="card">
    <div class="icon">🎂</div>

    <h3>Rango de edades</h3>

    @if($estudianteMayor && $estudianteMenor)

        <p>
            <strong>Mayor:</strong>
            {{ $estudianteMayor->nombre }}
            {{ $estudianteMayor->apellido }}
        </p>

        <p>
            <strong>Menor:</strong>
            {{ $estudianteMenor->nombre }}
            {{ $estudianteMenor->apellido }}
        </p>

    @else

        <p>No hay estudiantes registrados.</p>

    @endif
</div>
        </section>

        <section class="students">

            <h2>Últimos estudiantes registrados</h2>

            @if($ultimosEstudiantes->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Fecha de nacimiento</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($ultimosEstudiantes as $estudiante)

                            <tr>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->apellido }}</td>
                                <td>{{ $estudiante->dni }}</td>
                                <td>
                                    {{ $estudiante->fecha_nacimiento->format('d/m/Y') }}
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @else

                <p class="empty">
                    Todavía no hay estudiantes registrados.
                </p>

            @endif

            <a href="{{ route('estudiantes.index') }}" class="button">
                Ver todos los estudiantes →
            </a>

        </section>

    </main>

</body>
</html>