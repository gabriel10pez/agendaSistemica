<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $acta->numero_acta }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .justy {
            text-align: justify;
        }
    </style>
</head>

<body>
    <h2 class="text-center text-decoration-underline">ACTA {{ $acta->numero_acta }}-DDA-EPIS-FIMEES-UNAP</h2>
    <div class="row py-4">
        <div class="col-12">
            <p class="justy">En la ciudad de Puno, el día
                {{ date('d/m/Y', strtotime($evento->start)) }} a horas {{ date('h:iA', strtotime($evento->start)) }}, se
                llevó a cabo la reunión de docentes de la Escuela Profesional de Ingeniería de Sistemas de la
                Universidad Nacional del Altiplano Puno. La reunión tuvo lugar en {{ $evento->lugar_evento }} a las
                {{ date('h:iA', strtotime($evento->start)) }} y fue
                presidida por {{ $usuario->name }}.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>La reunión contó con la asistencia de los siguientes asistentes:</p>
            <ol>
                @foreach ($asistentes as $asis)
                    <li>{{ $asis->name }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="justy">El objetivo principal de esta reunión fue discutir y tomar decisiones sobre los siguientes temas:</p>
            <p class="justy">{{ $acta->cuerpo_acta }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p class="justy">No habiendo más asuntos que tratar, se dio por concluida la reunión a las
                {{ date('h:iA', strtotime($evento->end)) }}. Se acordó que las decisiones y acuerdos tomados serán
                comunicados a través de un acta oficial y se enviarán
                a todos los docentes de la Escuela Profesional de Ingeniería de Sistemas.</p>
        </div>
    </div>

    <div class="row justify-content-center text-center mt-3 inline-block">
        <div class="col-4 mt-5 py-5 inline-block">
            <p>____________________________________</p>
            <p>Organizador: {{ $usuario->name }}</p>
        </div>
        <div class="col-4 mt-5 py-5 inline-block">
            <p>___________________________________</p>
            <p>Director de Estudios</p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
