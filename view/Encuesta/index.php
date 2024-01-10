<!DOCTYPE html>
<html>
<head>
	<title>Encuesta HelpDesk</title>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <!-- Link SweeAlert2 -->
	<link rel="stylesheet" href="../../public/css/lib/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="../../public/css/separate/vendor/sweet-alert-animations.min.css">
</head>
<body>

    <div class="container">
        <section class="row">
            <div class="col-md-12" >
                <h1 class="text-center">Encuesta Post Servicio</h1>
            </div>
            <br>
        </section>
      <!--   <hr> -->
        <section class="row">
          
        </section>
        <section class="row">
            <section class="col-md-12">
                <section class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreCompleto">Nro de Ticket</label>
                            <input type="text" class="form-control" id="lblnomidticket" name="lblnomidticket" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaActual">Fecha Creacion</label>
                            <input type="text" class="form-control" id="lblfechcrea" name="lblfechcrea" readonly>
                        </div>
                    </div>
                </section>
                <section class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombreCompleto">Titulo</label>
                            <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                        </div>
                    </div>
                </section>
                <section class="row">
                    <div class="col-md-4">
                        <label for="categoria">Categoria</label>
                        <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="scat_nom">Sub Categoria</label>
                            <input type="text" class="form-control" id="scat_nom" name="scat_nom" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fechaActual">Prioridad</label>
                            <input type="text" class="form-control" id="prio_nom" name="prio_nom" readonly>
                        </div>
                    </div>
                </section>
                <section class="row">
                    <div class="col-md-4">
                        <label for="tipoAtencion">Usuario</label>
                        <input type="text" class="form-control" id="lblnomusuario" name="lblnomusuario" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fechaActual">Estado</label>
                            <input type="text" class="form-control" id="lblestado" name="lblestado" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombreCompleto">Fecha de Cierre</label>
                            <input type="text" class="form-control" id="lblfechcierre" name="lblfechcierre" readonly>
                        </div>
                    </div>
                    
                </section>

            </section>
        </section>
        <hr />

        <div id="panel1">

            <section class="row">
                <div class="col-md-12 text-center">
                    <input id="estrella" name="estrella" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0">
                </div>
            </section>

            <section class="row">
                <!-- <div class="col-md-12">
                    <h3>Comentarios.</h3>
                    <p></p>
                </div> -->
            </section>

            <section class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">Comentarios:</label>
                        <textarea id="tick_coment" name="tick_coment" class="form-control" rows="6" id="comentarios"></textarea>
                    </div>
                </div>
            </section>

            <section class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info" id="btnguardar">Guardar</button>
                </div>
               
            </section>
             <br>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="encuesta.js"></script>
<script>
    $('#tick_estre').rating({ 
        showCaption: false
    });
</script>
</body>
</html>