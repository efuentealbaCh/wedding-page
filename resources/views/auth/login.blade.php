@extends('layout.panel-user')
@section('content')
    <div class="section">
        <div class="container mt-5">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Ingresar</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('auth.ingresar')}}" method="POST" >
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input type="text" id="username" class="form-control" name="username" autofocus tabindex="1">
                            </div>

                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" name="contrasena" tabindex="2">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
