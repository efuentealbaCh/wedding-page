<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación de Asistencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="confirmationForm">
                    <label for="asistencia">Selecciona una opción:</label>
                    <select class="form-control" id="asistencia" name="asistencia">
                        <option value="" selected disabled>¿Podrás asistir?</option>
                        <option value="S">Sí, claro que voy a ir</option>
                        <option value="N">No, lo siento no puedo asistir a la boda</option>
                        <option value="SG">No puedo ir, pero quiero enviar mi regalo</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                {{-- <button type="button" class="btn btn-success" onclick="consola()">Confirmar</button> --}}
                <button type="button" class="btn btn-success" onclick="marcarAsistencia({{ Session::get('invitado.usua_codigo') }})">Confirmar</button>
            </div>
        </div>
    </div>
</div>
