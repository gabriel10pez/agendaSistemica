<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de memos</title>
  </head>
  <body>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Número</th>
                <th scope="col">Año</th>
                <th scope="col">Remitente</th>
                <th scope="col">Asunto</th>
                <th scope="col">Cuerpo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($memos as $memo)
                <tr>
                    <td>{{ $memo->id }}</td>
                    <td>{{ $memo->numero_memorandum }}</td>
                    <td>{{ $memo->anio_memorandum }}</td>
                    <td>{{ $memo->remitente_memorandum }}</td>
                    <td>{{ $memo->nombre_tipo_evento }}</td>
                    <td>{{ $memo->cuerpo_memorandum }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


  </body>
</html>
