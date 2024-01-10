<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])){
?>


<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
    <title>MAYTech | Consultar Ticket</title>
</head>
<body class="with-side-menu">
    <?php require_once("../MainHeader/header.php");?>
	

<div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Consultar Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
			
				<div class="row d-flex justify-content-center" id="viewuser">
				   
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label font-weight-bold" for="tick_titulo">Titulo</label>
								<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Titulo" required>
							</fieldset>
						</div>

						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label font-weight-bold" for="cat_id">Categoria</label>
								<select class="form-control" id="cat_id" name="cat_id" data-placeholder="Seleccionar">
									<option label="Seleccionar"></option>

								</select>
							</fieldset>
						</div>

						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label font-weight-bold" for="prio_id">Prioridad</label>
								<select class="form-control" id="prio_id" name="prio_id" data-placeholder="Seleccionar">
									<option label="Seleccionar"></option>

								</select>
							</fieldset>
						</div>

						<div class="col-lg-1">
							<fieldset class="form-group">
								<label class="form-label" for="btnfiltrar">&nbsp;</label>
								<button type="submit" class="btn btn-primary btn-block" id="btnfiltrar">Filtrar</button>
							</fieldset>
						</div>

						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" for="btntodo">&nbsp;</label>
								<button class="btn btn-warning btn-block" id="btntodo">Ver Todo</button>
							</fieldset>
						</div>
			         
			     </div>
			  <hr>
				

				<div class="box-typical box-typical-padding" id="table">
					<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 5%;">Nro.Ticket</th>
								<th style="width: 10%;">Categoria</th>
								<th class="d-none d-sm-table-cell" style="width: 20%;">Titulo</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
								<th class="d-none d-sm-table-cell" style="width: 8%;">Fecha</th>
								<th class="d-none d-sm-table-cell" style="width: 8%;">Fecha Asig</th>
								<th class="d-none d-sm-table-cell" style="width: 8%;">Soporte</th>
								<th class="text-center" style="width: 4%;">ver</th>
							
							</tr>
						</thead>
						   <tbody>

						   </tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
	<!-- Contenido -->


    <!-- Llamamos al Modal -->
	<?php require_once("Modal.php");?>

      <!-- Vinculamos el Js de consultarticket -->
	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="consultarticket.js"></script>
</body>
</html>

<?php
}else{
  header("location:".Conectar::ruta()."index.php");
}
?>