@extends('layoutsApp.app')
@section('content')
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Agenda Digital</h3>
                    </div>
                    <div class="card-body pt-2">
                        @livewire('memoranda.memolist')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
{{--agregamos para que esche lel livewuire--}}
@livewireScripts
@livewireStyles
<script>
    Livewire.on('alert',function(title,message){
            Lobibox.notify('success', {
                    width: 400,
                    img: "{{asset('imgs/success.png')}}",
                    position: 'top right',
                    title: title,
                    msg: message
                });
        })
</script>
@endpush
