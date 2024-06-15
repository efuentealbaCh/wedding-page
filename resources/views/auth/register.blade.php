@extends('layout.panel-user')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Registar invitado</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre" autofocus>
                                </div>
                                <div class="form-group col-xl-6">
                                    <label for="apellido">Apellido</label>
                                    <input id="apellido" type="text" class="form-control" name="apellido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <label for="username">User name</label>
                                    <input id="username" type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group col-xl-6">
                                    <label for="contrasena" class="d-block">Contraseña</label>
                                    <input id="contrasena" type="password" class="form-control" name="contrasena">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-3">
                                    <label for="vale">Invitación valida por</label>
                                    <input id="vale" type="number" class="form-control" name="vale">
                                </div>
                            </div>
                            <button class="btn btn-primary mr-1" type="submit"">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
