<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])){
?>


<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
    <title>MAYTech</>::Usuarios</title>
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
							<h3>Modulo Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Usuarios de sistema</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				
			<button type="button" id="btnnuevo" class="btn btn-inline btn-primary"><i class="font-icon font-icon-plus"></i>  Nuevo</button>

				<div class="box-typical box-typical-padding" id="table">
					<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 10%;">Nombre</th>
								<th style="width: 10%;">Apellido</th>
								<th class="d-none d-sm-table-cell" style="width: 10%;">Correo</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Password</th>
								<th class="d-none d-sm-table-cell" style="width: 2%;">Rol id</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Perfil</th>
								<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha</th>
								<th class="text-center" style="width: 5%;">Editar</th>
								<th class="text-center" style="width: 5%;">Eliminar</th>
							
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

	<?php require_once("modal.php");?>
	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="usuario.js"></script>
</body>
</html>

<?php
}else{
  header("location:".Conectar::ruta()."index.php");
}
?>