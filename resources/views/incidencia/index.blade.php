@extends('layoutsApp.app')
@section('content')
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Incidencias</h3>
                    </div>
                    <div class="card-body pt-2">
                        @livewire('incidencias')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection