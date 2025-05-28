<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar en Agenda</title>
    <style>
        img {
            max-width: 150px;
            height: auto;
            vertical-align: middle;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            margin-left: 10px;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Añadir datos a la agenda</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('agenda.store') }}">
        @csrf
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ date('Y-m-d') }}" required><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" value="{{ date('H:i') }}" required><br>

        <label for="idpersona">Persona:</label>
        <select name="idpersona" required>
            @foreach($personas as $persona)
                <option value="{{ $persona->idpersona }}">{{ $persona->nombre }} {{ $persona->apellidos }}</option>
            @endforeach
        </select><br><br>

        <label>Seleccione una imagen:</label><br>
        <table>
            @for ($i = 0; $i < 2; $i++)
                <tr>
                    @for ($j = 0; $j < 4; $j++)
                        @php $index = $i * 4 + $j; @endphp
                        <td>
                            @if (isset($imagenes[$index]))
                                <input type="radio" name="idimagen" value="{{ $imagenes[$index]->idimagen }}" required>
                                <img src="{{ asset($imagenes[$index]->imagen) }}" alt="Imagen">
                                <p>Imagen: {{ $imagenes[$index]->idimagen }}</p>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endfor
        </table>

        <input type="submit" value="Añadir entrada en agenda">
        <a href="{{ route('catalogo') }}">← Volver al listado</a>
    </form>
</body>
</html>
