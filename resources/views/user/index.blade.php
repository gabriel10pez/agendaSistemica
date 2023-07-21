@extends('layoutsApp.app')
@section('content')


    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">User</h3>
                    </div>
                    <div class="d-flex justify-content-end px-10">                          
                        {{-- <button class="btn btn-sm btn-primary" >Registrar</button> --}}
                    </td>
                    </div>
                    <div class="card-body pt-2">
                        <livewire:user>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection