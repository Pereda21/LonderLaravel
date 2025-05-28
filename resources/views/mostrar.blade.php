<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Agenda</title>
    <style>
        img {
            max-width: 100px;
            height: auto;
            vertical-align: middle;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        

        .volver {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Ver agenda</h1>

    <form method="GET" action="{{ route('agenda.mostrar') }}">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ request('fecha') }}" required>
        <br><br>
        <label for="idpersona">Persona:</label>
        <select name="idpersona" required>
            @foreach ($personas as $persona)
                <option value="{{ $persona->idpersona }}" {{ request('idpersona') == $persona->idpersona ? 'selected' : '' }}>
                    {{ $persona->nombre }} {{ $persona->apellidos }}
                </option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Mostrar Agenda">
        <a class="volver" href="{{ route('catalogo') }}">← Volver al listado</a>
    </form>

    @if (!is_null($resultados))
        @if (count($resultados) > 0)
            <h2>Agenda del Día</h2>
            <table>
                <tbody>
                    @foreach ($resultados->chunk(2) as $fila)
                        <tr>
                            @foreach ($fila as $evento)
                                <td>
                                    <img src="{{ asset($evento->imagen->imagen) }}" alt="Imagen">
                                    <br>
                                    <p>{{ $evento->imagen->imagen }}<br>{{ $evento->hora }}</p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: red;">No hay eventos para esta fecha.</p>
        @endif
    @endif

</body>
</html>
