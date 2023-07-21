@extends('layoutsApp.app')
@section('content')


    <div class="container col-md-12">
        <div class="row">

        @if (Auth::user()->tipo_usuario_id==1)
            <div class="col-md-12">

                
                    
                

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Editar Datos de Usuario</h3>
                    </div>
                    <div class="d-flex justify-content-end px-10">                          
                        {{-- <button class="btn btn-sm btn-primary" >Registrar</button> --}}
                    </td>
                    </div>
                    <div class="card-body pt-2">
                        <form action="{{route('user.update',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="lugar_evento">Nombre de Usuario</label>
                                    <input type="text" class="form-control" name="name"
                                        id="lugar_evento" value="{{$user->name}}">
                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lugar_evento">Email de Usuario</label>
                                    <input type="text" class="form-control" name="email"
                                        id="lugar_evento" value="{{$user->email}}">
                                    <small id="helpId" class="form-text text-muted">&nbsp;</small>
                                </div>
                                <div class="form-group ">
                                    <select class="form-select" aria-label="Default select example" name="tipo_usuario_id">
                                        <option >Tipo de Usuario</option>
                                        @foreach ($tipo as $t )
                                            <option {{ ($user->tipo_usuario_id==$t->id)? 'selected' : '' }} value="{{$t->id}}">{{$t->nombre_tipo_usuario}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row pt-5">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary" style="width: 300px;">Guardar Datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">Editar Contraseña</h3>
                </div>
                <div class="d-flex justify-content-end px-10">                          
                    {{-- <button class="btn btn-sm btn-primary" >Registrar</button> --}}
                </td>
                </div>
                <div class="card-body pt-2">
                    <form action="{{route('updatePass',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="lugar_evento">Nueva Contraseña</label>
                                <input type="password" class="form-control" name="password"
                                    id="lugar_evento" value="">
                                <small id="helpId" class="form-text text-muted">&nbsp;</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lugar_evento">Confirma Contraseña</label>
                                <input type="password" class="form-control" name="confirma"
                                    id="lugar_evento" value="">
                                <small id="helpId" class="form-text text-muted">&nbsp;</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary" style="width: 300px;">Guardar Contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection