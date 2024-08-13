@extends('layout.panel-user')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="col-xl-10 col-lg-10 col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 style="font-family: 'Times New Roman', Times, serif; color: black">
                                @if (Session::get('invitado.usua_asistencia') == 'P')
                                    Queridos amigos y familiares, estamos emocionados por compartir nuestro día espcial con
                                    ustedes. Te pedimos que en primera intancia confirmes la asistencia a nuestro evento
                                    dando
                                    <a href="#" data-target = "#confirmModal" data-toggle="modal">click aquí</a>. Una
                                    vez
                                    confirmada tu asistencia elige el regalo que quieres darnos.
                                @elseif (Session::get('invitado.usua_asistencia') == 'S')
                                    Queridos amigos y familiares, estamos emocionados de compartir nuestro día especial con
                                    ustedes. Su presencia en nuestra boda significa el mundo para nosotros, y no podemos
                                    esperar
                                    para celebrar juntos el amor y la alegría que nos rodea. ¡Gracias por acompañarnos en
                                    este
                                    momento tan importante de nuestras vidas!
                                @elseif (Session::get('invitado.usua_asistencia') == 'N')
                                    Queridos amigos y familiares, entendemos que no todos pueden unirse a nosotros en
                                    persona en este
                                    día tan especial. Aunque no puedan estar presentes físicamente, sepan que están en
                                    nuestros corazones
                                    y pensamientos. Apreciamos profundamente su amor y apoyo desde la distancia, y esperamos
                                    poder
                                    compartir recuerdos con ustedes en otra ocasión. ¡Gracias por su cariño!
                                @elseif (Session::get('invitado.usua_asistencia') == 'SG')
                                    Queridos amigos y familiares, aunque lamentamos que no puedan asistir a nuestra boda,
                                    apreciamos
                                    enormemente su amable gesto de enviar un regalo. Su generosidad y apoyo significan mucho
                                    para
                                    nosotros en este momento especial. Sabemos que están con nosotros en espíritu, y
                                    esperamos poder c
                                    elebrar juntos en el futuro. ¡Gracias por hacer nuestro día aún más especial con su
                                    amor!
                                @endif
                            </h5">
                            <h5>
                                Para saber la ubicación da <a href="#verMapa">click aquí</a> y llegarás a la sección de google maps con las indicaciones para
                                llegar al lugar de nuestra boda.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-10 col-lg-10 col-sm-10">
                <div class="card">
                    <div class="countdown-container">
                        <h1 class="clock">¡Nuestra Boda!</h1>
                        <div id="countdown">
                            <div class="time-segment">
                                <span id="days"></span>
                                <span>Días</span>
                            </div>
                            <div class="time-segment">
                                <span id="hours"></span>
                                <span>Horas</span>
                            </div>
                            <div class="time-segment">
                                <span id="minutes"></span>
                                <span>Minutos</span>
                            </div>
                            <div class="time-segment">
                                <span id="seconds"></span>
                                <span>Segundos</span>
                            </div>
                        </div>
                    </div>
                    <div id="celebration-message"></div>
                    <div id="fireworks"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-10 col-lg-10 col-sm-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"> Elige tu regalo para nosotros </h4>
                            <div class="card-header-action">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="btn btn-danger float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                            </div>
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
                                                    <button class="btn btn-primary"
                                                        onclick="reservar('{{ Session::get('invitado.usua_codigo') }}',{{ $regalo->rega_codigo }},'{{ Session::get('invitado.usua_asistencia') }}')">Reservar
                                                        regalo</button>
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

            <div class="row" id="verMapa">
                <div class="col-xl-10 col-lg-10 col-sm-10">
                    <div class="card">
                        {{-- <div id="map" style="height: 10cm; width: 100%"></div> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3108.7476768497622!2d-72.68081422333162!3d-38.81533447174164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9614d180dd75a34f%3A0x280a673f6296d9ec!2sCentro%20Evento%20Antu%20Newen!5e0!3m2!1ses!2scl!4v1721962357765!5m2!1ses!2scl"
                            style="border:2cm; height: 10cm; width: 100%;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <x-modal_confirmar_asistencia />
@endsection
@section('js-add')
    <script src="{{ asset('js/utils/gifts.js') }}"></script>
    <script src="{{ asset('js/utils/clock.js') }}"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection
