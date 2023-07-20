<div>
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
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                {{-- <th scope="col">Imagen</th> --}}

                <th scope="col" width="200px">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->rowNumber }}</td>
                    <td>{{ $incidencia->titulo_incidencia }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    {{-- <td><img src="{{$incidencia->foto_incidencia}}"></td> --}}
                    <td>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $incidencia->id }})"> <i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- Botón "Anterior" -->
            <li class="page-item {{ $incidencias->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="previousPage" tabindex="-1">
                    Anterior
                </a>
            </li>

            <!-- Números de página -->
            @php
                $start = max(1, $incidencias->currentPage() - 2);
                $end = min($start + 4, $incidencias->lastPage());
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
                <li class="page-item {{ $page == $incidencias->currentPage() ? 'active' : '' }}">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                </li>
            @endfor

            <!-- Mostrar última página -->
            @if ($end < $incidencias->lastPage())
                @if ($end < $incidencias->lastPage() - 1)
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $incidencias->lastPage() }})">{{ $incidencias->lastPage() }}</a>
                </li>
            @endif

            <!-- Botón "Siguiente" -->
            <li class="page-item {{ $incidencias->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="nextPage">
                    Siguiente
                </a>
            </li>
        </ul>
    </nav>
</div>
