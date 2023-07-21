<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - {{ $reportes[0]->name }}</title>
    <link rel="shortcut icon" href="{{ asset('imgs/sistemas.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .justy {
            text-align: justify;
        }
    </style>
</head>

<body>
    {{-- AGREGA CEROS A LA IZQUIERDA --}}
    {{-- @php
        $numero = $acta->numero_acta;
        $digitos = strlen((string) $numero);

        if ($digitos <= 6) {
            $numeroFormateado = str_pad($numero, 8, '0', STR_PAD_LEFT);
            $resultado = $numeroFormateado;
        } else {
            $resultado = $numero;
        }
    @endphp --}}
    <h2 class="text-center text-decoration-underline">REPORTE DE ASISTENCIAS</h2>
    <div class="row py-4">
        <h4>{{ $reportes[0]->name }}</h4>
        <p><strong>Fecha: </strong>{{ date('d/m/Y', strtotime(now())) }}
            {{ date('h:iA', strtotime(now())) }}</p>
        <ol>
            @foreach ($reportes as $report)
                <li>
                    {{ $report->title }} - {{ date('d/m/Y', strtotime($report->start)) }}
                    {{ date('h:iA', strtotime($report->start)) }} -
                    @if ($report->asistio)
                        ASISTIÓ
                    @else
                        NO ASISTIÓ
                    @endif
                </li>
            @endforeach
        </ol>
    </div>

    <div class="row">
        <h5>Recuento de Asistencias</h5>
        <p><strong>Reuniones totales: {{ $asistotal }}</strong></p>
        <p><strong>Faltas: </strong> {{ $noasistio }}</p>
        <p><strong>Asistencias: </strong> {{ $asistio }}</p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
