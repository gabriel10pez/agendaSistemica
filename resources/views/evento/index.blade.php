@extends('layoutsApp.app')
@section('content')
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Agenda Digital</h3>
                    </div>

                    <div class="card-body pt-2">
                        <div>Para agregar un evento solo debes hacer click en una fecha, para editar y/o borrar hacer click
                            sobre cada evento.</div><br>
                        <div id="agenda" name="agenda">
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Datos del Evento</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="formularioEventos" name="formularioEventos">
                                            {{ csrf_field() }}
                                            <div class="form-group d-none">
                                                <label for="id">ID</label>
                                                <input type="text" class="form-control" name="id">
                                                <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Título</label>
                                                <input type="text" class="form-control" name="title" id="title">
                                                <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="lugar_evento">Lugar Evento</label>
                                                    <input type="text" class="form-control" name="lugar_evento"
                                                        id="lugar_evento">
                                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="title">Resolución del Evento</label>
                                                    <input type="text" class="form-control" name="resolucion">
                                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="title">Costo del Evento</label>
                                                    <input type="text" class="form-control" name="costo">
                                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="title">Tipo del Evento</label>
                                                    <select name="tipo_event_id" id="tipo_event_id" class="form-select">
                                                        @foreach ($tipo as $item)
                                                            <option value="{{ $item->id }}"
                                                                data-tiene-memo="{{ $item->tiene_memo }}">
                                                                {{ $item->nombre_tipo_evento }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" id="memo">
                                                <div class="form-group">
                                                    <label for="memorandum">Cuerpo del Memorándum</label>
                                                    <textarea class="form-control" name="memorandum" id="memorandum" rows="1"></textarea>
                                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-check form-check-inline mx-3 ">
                                                    <input class="form-check-input" type="radio" name="grupo"
                                                        id="comunidad_sis" value="comunidad_sis">
                                                    <label class="form-check-label" for="comunidad_sis">Comunidad
                                                        Sistémica</label>
                                                </div>
                                                <div class="form-check form-check-inline mx-3 mt-1">
                                                    <input class="form-check-input" type="radio" name="grupo"
                                                        id="docentes" value="docentes">
                                                    <label class="form-check-label" for="docentes">Docentes</label>
                                                </div>
                                                <div class="form-check form-check-inline mx-3 mt-1">
                                                    <input class="form-check-input" type="radio" name="grupo"
                                                        id="estudiantes" value="estudiantes">
                                                    <label class="form-check-label" for="estudiantes">Estudiantes</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="title">Asistentes</label>
                                                    <select id="asistentes" class="select2" style="width: 100%"
                                                        name="id_asistente_usuario[]" multiple="multiple">
                                                        @foreach ($usuarios as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="description" id="description" rows="1"></textarea>
                                                <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="date" class="form-control" name="start"
                                                        id="start" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Fecha
                                                        Inicio</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="time" class="form-control" name="startH"
                                                        id="startH" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Hora Inicio</small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="date" class="form-control" name="end"
                                                        id="end" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Fecha Fin</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="time" class="form-control" name="endH"
                                                        id="endH" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Hora Fin</small>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                                        <button type="button" class="btn btn-primary"
                                            id="btnModificar">Modificar</button>
                                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                                        <button type="button" class="btn btn-secondary" id="btnCerrar">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('.modal')
            });
        });
    </script>

    {{-- form memorandum --}}
    <script>
        const selectElement = document.getElementById('tipo_event_id');
        const memoDiv = document.getElementById('memo');
        const memorandum = document.getElementById('memorandum');

        selectElement.addEventListener('change', function() {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const tieneMemo = selectedOption.dataset.tieneMemo;

            if (tieneMemo === '1') {
                memoDiv.style.display = 'block';
                memorandum.removeAttribute('disabled');
            } else {
                memoDiv.style.display = 'none';
                memorandum.setAttribute('disabled', 'disabled');
            }
        });
    </script>

    <script>
        const comunidad = document.getElementById('comunidad_sis');
        const asistentes = document.getElementById('asistentes');
        const docentes = document.getElementById('docentes');
        const estudiantes = document.getElementById('estudiantes');


        comunidad.addEventListener('change', function() {
            if (comunidad.checked) {
                asistentes.setAttribute('disabled', 'disabled');
            } else {
                asistentes.removeAttribute('disabled');
            }
        });

        docentes.addEventListener('change', function() {
            if (docentes.checked) {
                asistentes.removeAttribute('disabled');
            } else {
                asistentes.setAttribute('disabled', 'disabled');
            }
        });

        estudiantes.addEventListener('change', function() {
            if (estudiantes.checked) {
                asistentes.removeAttribute('disabled');
            } else {
                asistentes.setAttribute('disabled', 'disabled');
            }
        });
    </script>
@endpush
