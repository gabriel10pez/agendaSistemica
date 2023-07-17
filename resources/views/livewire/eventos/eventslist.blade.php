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
                <th scope="col">Asunto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Lugar</th>
                <th scope="col" width="200px">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $evento->rowNumber }}</td>
                    <td>{{ $evento->title }}</td>
                    <td>{{ $evento->description }}</td>
                    <td>{{ $evento->nombre_tipo_evento }}</td>
                    <td>
                        <small>
                            <p>
                                <strong>Inicio:</strong>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('d/m/Y - h:iA') }}
                            </p>
                        </small>
                        <small>
                            <p>
                                <strong>Fin:</strong>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('d/m/Y - h:iA') }}
                            </p>
                        </small>
                    </td>
                    <td>{{ $evento->lugar_evento }}</td>
                    <td>
                        <a href="{{ route('control_evento_acta', $evento->eventid) }}" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-file-lines"></i>
                            Control</a>

                        <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- Botón "Anterior" -->
            <li class="page-item {{ $eventos->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="previousPage" tabindex="-1">
                    Anterior
                </a>
            </li>

            <!-- Números de página -->
            @php
                $start = max(1, $eventos->currentPage() - 2);
                $end = min($start + 4, $eventos->lastPage());
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
                <li class="page-item {{ $page == $eventos->currentPage() ? 'active' : '' }}">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                </li>
            @endfor

            <!-- Mostrar última página -->
            @if ($end < $eventos->lastPage())
                @if ($end < $eventos->lastPage() - 1)
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $eventos->lastPage() }})">{{ $eventos->lastPage() }}</a>
                </li>
            @endif

            <!-- Botón "Siguiente" -->
            <li class="page-item {{ $eventos->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="nextPage">
                    Siguiente
                </a>
            </li>
        </ul>
    </nav>
</div>
