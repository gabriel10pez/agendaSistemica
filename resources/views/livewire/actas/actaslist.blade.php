<div>
    <div>

        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-magnifying-glass"></i></span>
                    <input wire:model="search" type="text" class="form-control" placeholder="Buscardor"
                        aria-label="Username" aria-describedby="basic-addon1" style="background-color: #fff">
                </div>
            </div>
        </div>
        @if ($actas->count())
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Número</th>
                        <th scope="col">Cuerpo</th>
                        <th scope="col">Remitente</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actas as $acta)
                        <tr>
                            <td>{{ $acta->rowNumber }}</td>
                            <td>{{ $acta->numero_acta }}</td>
                            <td>{{ $acta->cuerpo_acta }}</td>
                            <td>{{ $acta->user_name }}</td>
                            <td>{{ $acta->title }} - {{ $acta->nombre_tipo_evento }}</td>
                            <td>
                                <small>
                                    <p>
                                        <strong>Inicio:</strong>
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $acta->start)->format('d/m/Y - h:iA') }}
                                    </p>
                                </small>
                                <small>
                                    <p>
                                        <strong>Fin:</strong>
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $acta->end)->format('d/m/Y - h:iA') }}
                                    </p>
                                </small>
                            </td>
                            <td><a target="_blank" href="{{ route('acta_pdf', $acta) }}"
                                    class="btn btn-sm btn-success"><i class="fa-solid fa-print"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <!-- Botón "Anterior" -->
                    <li class="page-item {{ $actas->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link cursor-pointer" wire:click="previousPage" tabindex="-1">
                            Anterior
                        </a>
                    </li>

                    <!-- Números de página -->
                    @php
                        $start = max(1, $actas->currentPage() - 2);
                        $end = min($start + 4, $actas->lastPage());
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
                        <li class="page-item {{ $page == $actas->currentPage() ? 'active' : '' }}">
                            <a class="page-link cursor-pointer"
                                wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                        </li>
                    @endfor

                    <!-- Mostrar última página -->
                    @if ($end < $actas->lastPage())
                        @if ($end < $actas->lastPage() - 1)
                            <li class="page-item disabled">
                                <a class="page-link">...</a>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link cursor-pointer"
                                wire:click="gotoPage({{ $actas->lastPage() }})">{{ $actas->lastPage() }}</a>
                        </li>
                    @endif

                    <!-- Botón "Siguiente" -->
                    <li class="page-item {{ $actas->nextPageUrl() ? '' : 'disabled' }}">
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

</div>
