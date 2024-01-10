<div class="modal fade" id="modaluser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="titulo">Titulo</h4>
            </div>


            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label semibold" for="usu_nom">Nombre</label>
                        <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="usu_apep">Apellidos</label>
                        <input type="text" class="form-control" id="usu_apep" name="usu_apep" placeholder="Ingrese Apellidos" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="usu_correo">Correo Eléctronico</label>
                        <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese Correo Eléctronico" required>
                    </div>


                    <div class="form-group">
                        <label class="form-label semibold" for="rol_id">Rol Usuario</label>
                        <select class="select2" id="rol_id" name="rol_id">
                            <option value="1">Usuario</option>
                            <option value="2">Soporte</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="usu_correo">Contraseña</label>
                        <input type="password" class="form-control" id="usu_pass" name="usu_pass">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-success">Registrar</button>
                </div>

            </form>


        </div>
    </div>
</div>
<!--.modal-->