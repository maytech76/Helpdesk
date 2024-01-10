<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

?>


	<!DOCTYPE html>
	<html>

	<?php require_once("../MainHead/head.php"); ?>
	<!-- link libery morris js -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	</head>

	<body class="with-side-menu">
		<?php require_once("../MainHeader/header.php"); ?>


		<div class="mobile-menu-left-overlay"></div>

		<?php require_once("../MainNav/nav.php"); ?>

		<!-- ==== Cuerpo Principal ===== -->
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-sm-4">
								<article class="statistic-box green shadow-sm">
									<div>
										<div class="number" id="lbltotal"></div>
										<div class="caption">Total de Tickes</div>
									</div>
								</article>
							</div>
							<div class="col-sm-4">
								<article class="statistic-box yellow">
									<div>
										<div class="number" id="lbltotalabierto"></div>
										<div class="caption">Total Abiertos</div>
									</div>
								</article>
							</div>
							<div class="col-sm-4">
								<article class="statistic-box red">
									<div>
										<div class="number" id="lbltotalcerrado"></div>
										<div class="caption">Total Cerrado</div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>

				<!-- iniciao Morrisjs BarChart -->

				<section class="card">
					<header class="card-header">
						Tickets por Categoria
					</header>
					<div class="card-block">
						<div id="divgrafico" style="height: 250px;"></div>
					</div>
				</section>


			</div><!--.container-fluid-->
		</div><!--.page-content-->

		<?php require_once("../MainJs/js.php"); ?>
		<!--  script librery morris js for charts js -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

		<script type="text/javascript" src="home.js"></script>
	</body>

	</html>

<?php
} else {
	header("location:" . Conectar::ruta() . "index.php");
}
?>