@extends('layout.panel-user')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="section-body">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lista de invitados</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="table-users">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Username</th>
                                            <th>Estado de asistencia</th>
                                            <th>Valido por</th>
                                            <th>Rol en sistema</th>
                                            <th>Regalo elegido</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th>{{ $user->usua_nombre }}</th>
                                                <th>{{ $user->usua_apellido }}</th>
                                                <th>{{ $user->usua_nombre_usuario }}</th>
                                                <th>{{ $user->usua_asistencia }}</th>
                                                <th>{{ $user->usua_valido }}</th>
                                                <th>{{ $user->usua_rol }}</th>
                                                <th>Falta regalo</th>
                                                <th>Falta acciones</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-add')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable({
                "columnDefs": [{
                    "sortable": false,
                }]
            });
        });
    </script>
@endsection
