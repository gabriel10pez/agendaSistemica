@extends('layoutsApp.app')
@section('content')

@include('livewire.incidenciamodel')
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Incidencias</h3>
                    </div>
                    <div class="@if (Auth::user()->tipo_usuario_id==1)d-flex justify-content-end @endif px-10">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveModal">
                            <i class="fa-solid fa-plus"></i>Registrar Incidencia
                          </button>
                          
                        {{-- <button class="btn btn-sm btn-primary" >Registrar</button> --}}
                    </td>
                    </div>
                    @if (Auth::user()->tipo_usuario_id==1)
                    <div class="card-body pt-2">
                        <livewire:incidencias>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection