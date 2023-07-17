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
                        <td><button><i class="fa-solid fa-eye"></i></button>
                            <button id="miBoton"> <i class="fa-solid fa-pen-to-square"></i></button>
                            <button id="miBoton2"> <i class="fa-solid fa-trash"></i></button>
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
</div>
<script>
// Obtener el botón por su ID
    var boton = document.getElementById("miBoton");
    var boton2 = document.getElementById("miBoton2");


    // Agregar un evento de clic al botón
    boton.addEventListener("click", function() {

    // Realizar alguna acción al hacer clic en el botón
    console.log("¡Haz hecho clic en el botón editar!");
    });
    boton2.addEventListener("click", function() {
    // Realizar alguna acción al hacer clic en el botón
    console.log("¡Haz hecho clic en el botón eliminar!");
    });
</script>
