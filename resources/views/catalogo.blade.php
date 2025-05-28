<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Pictogramas</title>
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
    </style>
</head>
<body>
    <h1>Listado pictogramas</h1>
    <table>
        <tbody>
            @for ($i = 0; $i < 2; $i++)  {{-- 2 filas --}}
                <tr>
                    @for ($j = 0; $j < 4; $j++)  {{-- 4 columnas --}}
                        @php $contador = $i * 4 + $j; @endphp
                        <td>
                            @if (isset($imagenes[$contador]))
                                <img src="{{ asset($imagenes[$contador]->imagen) }}" alt="Imagen">
                                <br>
                                <p>{{ $imagenes[$contador]->imagen }}</p>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    <div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('agenda.create') }}" style="margin-right: 20px;">➕ Insertar nueva agenda</a>
    <a href="{{ route('agenda.mostrar') }}">📅 Ver agenda por persona y fecha</a>
</div>

</body>
</html>
