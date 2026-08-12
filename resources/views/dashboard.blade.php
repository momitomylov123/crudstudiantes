
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Estudiantes</title>

    <!-- Cute / coquette styling -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Dancing+Script&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(160deg, #fff7fb 0%, #fffaf2 50%, #f7f6ff 100%);
            color: #3b3b3b;
        }

        .navbar {
            background: linear-gradient(90deg,#ffd6e8 0%, #d8c7ff 100%);
            color: #4b2b5a;
            padding: 18px 36px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            box-shadow: 0 8px 30px rgba(91,40,111,0.08);
        }

        .navbar h1 {
            font-size: 26px;
            font-family: 'Dancing Script', cursive;
            letter-spacing: 0.6px;
        }

        .navbar a {
            color: #4b2b5a;
            text-decoration: none;
            background: rgba(255,255,255,0.9);
            padding: 10px 18px;
            border-radius: 999px;
            font-weight: 600;
            box-shadow: 0 6px 18px rgba(75,43,90,0.08);
        }

        .container {
            max-width: 980px;
            margin: 34px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            font-size: 32px;
            margin-bottom: 8px;
            color: #5b2b6f;
            font-family: 'Dancing Script', cursive;
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
            background: linear-gradient(180deg,#fff 0%, #fff6fb 100%);
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(92,33,88,0.06);
            border: 1px solid rgba(200,170,200,0.18);
        }

        .card .icon {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .card h3 {
            color: #7a4b7f;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .card .number {
            font-size: 30px;
            font-weight: 700;
            color: #d6336c;
        }

        .students {
            background: linear-gradient(180deg,#ffffff 0%, #fffaf6 100%);
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(87,30,84,0.04);
            border: 1px solid rgba(220,190,220,0.16);
        }

        .students h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #f2e9f2;
        }

        th {
            color: #666;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            background: linear-gradient(90deg,#ff9ac9 0%, #bda0ff 100%);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 999px;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(189,160,255,0.16);
        }

        .button:hover { transform: translateY(-3px); }

        .empty {
            color: #8a6b89;
            padding: 20px 0;
            font-style: italic;
        }

        /* small touches */
        .card .icon.heart { filter: drop-shadow(0 6px 14px rgba(214,51,108,0.12)); }
        table tr:hover td { background: rgba(255,150,200,0.04); }
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