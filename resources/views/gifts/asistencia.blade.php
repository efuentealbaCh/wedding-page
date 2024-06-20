@extends('layout.panel-user')
@section('content')
    <div class="main-wrapper">
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10-col-sm-10">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center"> Confirma Asistencia </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-4">
                                            <button class="btn btn-success">Si puedo asistir</button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-danger">No puedo asistir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
