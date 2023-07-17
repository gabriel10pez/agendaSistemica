<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">

    <title>Memorandum Generado</title>
</head>

<body>
    <div class="container py-5">
    <h4 class="text-center text-decoration-underline">MEMORANDO ELECTRÓNICO. N°{{$memo->numero_memorandum}}-DDA-EPIS-FIMEES-UNAP</h4>
    <div class="row">
        <div class="col-12">
            <p class="text-center"></p>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <p><strong>De: </strong>{{ $remitente->name }}</p>
            <p> <strong>Para: </strong>@foreach ($asistentes as $index => $asis)
              {{ $asis->name }}
              @if ($index < count($asistentes) - 1)
                  ,
              @else
                  .
              @endif
          @endforeach</p>
            <p><strong>Asunto: </strong>{{$memo->nombre_tipo_evento}}</p>
            <p><strong>Fecha: </strong>{{ 'Puno, ' . \Carbon\Carbon::parse($memo->created_at)->locale('es_ES')->isoFormat('LL') }}</p>
        </div>
        <strong>-----------------------------------------------------------------------------------------------------</strong>
    </div>
    <div class="row">
        <div class="col-12">
            <p>Estimado(a)(s),</p>
            <p>Es grato saludarlo(s), y a la vez mediante el presente decir que: {{$memo->cuerpo_memorandum}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>Atentamente,</p>
            <p>{{ $remitente->name }}</p>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>


