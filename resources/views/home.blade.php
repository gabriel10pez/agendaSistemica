@extends('layouts.app')

@push('css')
    {{-- css por añadir --}}
@endpush

@section('content')
    {{-- CONTENIDO --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-bg-success">{{ __('Bienvenido al sistema') }}</div>

                    <div class="card-body">
                        Te damos la bienvenida
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- js por añadir --}}
@endpush
