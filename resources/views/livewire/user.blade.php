@if(Auth::user()->tipo_usuario_id != 1)
<div class="row d-flex">
    <div class="col-md-3">
        <a href="{{route('user.edit',Auth::user()->id)}}" type="submit" class="btn btn-primary" style="width: 300px;">Ir a Cambiar contraseña</a>
    </div>
</div>

@else
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
                <th scope="col">Nombre de Usuario</th>
                <th scope="col">Email de usuario</th>
                {{-- <th scope="col">Imagen</th> --}}

                <th scope="col" width="200px">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->rowNumber }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- <td><img src="{{$incidencia->foto_incidencia}}"></td> --}}
                    <td>
                        <a class="btn btn-sm btn-success" href="{{route('user.edit',$user->id)}}" >
                        <i class="fa-solid fa-pen-to-square"></i></a>
                        {{-- <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})"> <i class="fa-solid fa-trash"></i></button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <!-- Botón "Anterior" -->
            <li class="page-item {{ $users->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="previousPage" tabindex="-1">
                    Anterior
                </a>
            </li>

            <!-- Números de página -->
            @php
                $start = max(1, $users->currentPage() - 2);
                $end = min($start + 4, $users->lastPage());
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
                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                </li>
            @endfor

            <!-- Mostrar última página -->
            @if ($end < $users->lastPage())
                @if ($end < $users->lastPage() - 1)
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link cursor-pointer"
                        wire:click="gotoPage({{ $users->lastPage() }})">{{ $users->lastPage() }}</a>
                </li>
            @endif

            <!-- Botón "Siguiente" -->
            <li class="page-item {{ $users->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link cursor-pointer" wire:click="nextPage">
                    Siguiente
                </a>
            </li>
        </ul>
    </nav>
</div>
@endif