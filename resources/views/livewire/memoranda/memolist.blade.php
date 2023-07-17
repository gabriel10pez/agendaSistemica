<div>
    @if($memos->count())
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-magnifying-glass"></i></span>
                <input wire:model="search" type="text" class="form-control" placeholder="Buscardor" aria-label="Username"
                    aria-describedby="basic-addon1" style="background-color: #fff">
            </div>
        </div>
    </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Número</th>
                    <th scope="col">Año</th>
                    <th scope="col">Remitente</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Cuerpo</th>
                    <th scope="col">Acción</th>
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
                        <td>
                            <a class="btn btn-success" href="" data-bs-toggle="modal"
                                data-bs-target="#editar_memo" wire:click="edit({{$memo}})" >
                                    <i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-info" href="{{ route('memoranda-report')}}"   >
                                    <i class="fa-solid fa-print"></i></a>

                            {{-- @livewire('memoranda.edit-memo', ['memo' => $memo], key($memo->id)) @livewire('memoranda.imprimir-memo', ['memo' => $memo], key($memo->id)) --}}

                            {{-- <button class="btn btn-primary" id="miBoton3"><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-success"id="miBoton2"> <i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger"id="miBoton2"> <i class="fa-solid fa-trash"></i></button> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- Botón "Anterior" -->
            <li class="page-item {{ $memos->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="previousPage" tabindex="-1">
                    Anterior
                </a>
            </li>

            <!-- Números de página -->
            @php
                $start = max(1, $memos->currentPage() - 2);
                $end = min($start + 4, $memos->lastPage());
            @endphp

            <!-- Mostrar número 1 -->
            @if ($start > 1)
                <li class="page-item">
                    <a class="page-link cursor-pointer" wire:click="gotoPage(1)">1</a>
                </li>
                @if ($start > 2)
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
            @endif

            <!-- Mostrar números de página -->
            @for ($page = $start; $page <= $end; $page++)
                <li class="page-item {{ $page == $memos->currentPage() ? 'active' : '' }}">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                </li>
            @endfor

            <!-- Mostrar última página -->
            @if ($end < $memos->lastPage())
                @if ($end < $memos->lastPage() - 1)
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $memos->lastPage() }})">{{ $memos->lastPage() }}</a>
                </li>
            @endif

            <!-- Botón "Siguiente" -->
            <li class="page-item {{ $memos->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="nextPage">
                    Siguiente
                </a>
            </li>
        </ul>
    </nav>
    @else
        <div class="px-12 py-1">
            No existe ningun Memorandum
        </div>

    @endif

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
                <form wire:submit.prevent="actualizar_memo">
                    @csrf
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
<script>
// Obtener el botón por su ID
    var boton = document.getElementById("miBoton");
    var boton2 = document.getElementById("miBoton2");
    var boton3 = document.getElementById("miBoton3");


    // Agregar un evento de clic al botón
    boton.addEventListener("click", function() {

    // Realizar alguna acción al hacer clic en el botón
    console.log("¡Haz hecho clic en el botón editar!");
    });
    boton2.addEventListener("click", function() {
    // Realizar alguna acción al hacer clic en el botón
    console.log("¡Haz hecho clic en el botón eliminar!");
    });
    boton3.addEventListener("click", function() {
    // Realizar alguna acción al hacer clic en el botón
    alert("vamos  aver la vista");
    });
</script>
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
