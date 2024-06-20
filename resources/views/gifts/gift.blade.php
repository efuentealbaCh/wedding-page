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
                                    <h4 class="text-center"> Elige tu regalo para nosotros </h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($regalos as $regalo)
                                            <div class="col-xl-3">
                                                <div class="card">

                                                    <img src="{{ asset($regalo->rega_ruta_imagen) }}"
                                                        style="width: 100%;height: 100%;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $regalo->rega_nombre }}</h5>
                                                        <p class="card-text">{{ $regalo->rega_descripcion }} <br> <a
                                                                href="{{ $regalo->rega_link }}">Enlace de
                                                                referencia</a> <br>
                                                            @if ($regalo->rega_estado == 1)
                                                                <div class="badge badge-success badge-shadow">
                                                                    <i class="fas fa-check"></i> Disponible
                                                                </div>
                                                            @else
                                                                <div class="badge badge-danger badge-shadow">
                                                                    <i class="fas fa-times"></i> Reservado
                                                                </div>
                                                            @endif
                                                        </p>
                                                        @if ($regalo->rega_estado == 1)
                                                            <a class="btn btn-primary">Reservar regalo</a>
                                                        @else
                                                            <button class="btn btn-danger" disabled>Reservado</button>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

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
