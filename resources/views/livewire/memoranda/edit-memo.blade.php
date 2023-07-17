<script>

</script>
<div>
    <a class="btn btn-success" href="" data-bs-toggle="modal"
    data-bs-target="#editar_memo" wire:click="edit({{$memo}})" >
        <i class="fa-solid fa-pen-to-square"></i></a>

    {{-- modal --}}
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editar_memo" tabindex="-1" role="dialog"
            aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-normal" id="modal-title-default">Editando el Memorando {{$memo->numero_memorandum}}   </h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="" name="">
                    {{ csrf_field() }}
                    <div class="form-group d-none">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name="id">
                        <small id="helpId" class="form-text text-muted">&nbsp;</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="lugar_evento">Remitente</label>
                            <input type="text" class="form-control" value="{{$memo->remitente_memorandum}}" name="lugar_evento"
                                id="lugar_evento" disabled>
                            <small id="helpId" class="form-text text-muted">&nbsp;</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">anio</label>
                            <input type="text" class="form-control" value="{{$memo->anio_memorandum}}"  name="resolucion" disabled>
                            <small id="helpId" class="form-text text-muted">&nbsp;</small>
                        </div>
                        <div class="form-group">
                            <label for="title">Asunto</label>
                            <input type="text" class="form-control"  value="{{$memo->nombre_tipo_evento}}" name="title" id="title" disabled>
                            <small id="helpId" class="form-text text-muted">&nbsp;</small>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Cuerpo</label>
                            <textarea class="form-control" name="description" value=""  id="description" rows="1"> {{$memo->cuerpo_memorandum}}</textarea>
                            <small id="helpId" class="form-text text-muted">&nbsp;</small>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar </button>
                        <button type="submit" class="btn bg-gradient-primary" id="boton" wire:loading.remove>Actualizar</button>
                        <span wire:loading class="">Cargando....</span>

            </div>
        </div>
    </div>
</div>

</div>

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
