@extends('layoutsApp.app')
@section('content')
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Control de Eventos - Acta</h3>
                    </div>
                    <div class="mx-8">
                        <h3 class="card-title fw-bolder text-dark">{{ $evento->title }}</h3>
                    </div>
                    <div class="card-body pt-2">
                        <form action="{{ route('control_evento_acta_guardar', $evento) }}" method="POST">
                            @csrf
                            <div class="row mb-2">
                                <h5 class="card-title fw-bolder text-dark">Lista de asistentes</h5>
                                <p>Marque las casilla de quienes asistieron a la reunión</p>

                                <div class="form-check mx-7 mb-2">
                                    <input class="form-check-input asis" type="checkbox" value="xd" id="xd">
                                    <label class="form-check-label" for="xd">
                                        Todos
                                    </label>
                                </div>

                                @foreach ($asistentes as $asistente)
                                    <div class="form-check mx-7 mb-2">
                                        <input class="form-check-input asis" type="checkbox"
                                            value="{{ $asistente->id_asistente_usuario }}" name="asistencia[]"
                                            id="{{ $asistente->id_asistente_usuario }}">
                                        <label class="form-check-label" for="{{ $asistente->id_asistente_usuario }}">
                                            {{ $asistente->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="title">Cuerpo del Acta</label>
                                    <textarea class="form-control" name="cuerpo_acta" rows="3" required></textarea>
                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Guardar Acta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Obtener referencia al checkbox "Todos"
            const checkboxTodos = $('#xd');

            // Obtener referencia a todos los checkboxes de asistentes
            const checkboxesAsistentes = $('.form-check-input.asis');

            // Agregar evento al checkbox "Todos"
            checkboxTodos.on('change', function() {
                const isChecked = $(this).is(':checked');

                // Marcar/desmarcar todos los checkboxes de asistentes
                checkboxesAsistentes.prop('checked', isChecked);
            });
        });
    </script>
@endpush
