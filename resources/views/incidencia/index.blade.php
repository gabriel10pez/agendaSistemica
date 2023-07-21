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
                    <div class="d-flex justify-content-end px-10">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveModal">
                            Registrar
                          </button>
                          
                        {{-- <button class="btn btn-sm btn-primary" >Registrar</button> --}}
                    </td>
                    </div>
                    <div class="card-body pt-2">
                        <livewire:incidencias>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection