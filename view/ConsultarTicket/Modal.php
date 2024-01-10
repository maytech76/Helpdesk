<div id="modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdtitulo"></h5>
            </div>
            <form id="ticket_form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="tick_id" id="tick_id">
                    <div class="form-group">
                        <label class="form-label" for="usu_asig">Soporte</label>
                        <select class="select2" name="usu_asig" id="usu_asig" data-placeholder="Seleccionar"></select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-primary">Asignar</button>
                </div>
        </div>
        </form>
    </div>
</div>