
<?php
if ($_SESSION["rol_id"]==1){
?>
<!-- ---------MENU DE NAVEGACION ---------- -->
<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
            <li class="red">
	            <a href="../Home/">
				<i class="tag-color green"></i>
	                <span class="lbl">Inicio</span>
	            </a>
	        </li>
            

            <li class="red">
	            <a href="../NuevoTicket/">
	                <i class="tag-color grey-blue"></i>
	                <span class="lbl">Nuevo Ticket</span>
	            </a>
	        </li>

			<li class="blue-dirty">
	            <a href="../ConsultarTicket/">
				<i class="tag-color orange"></i>
	                <span class="lbl">Consultar Ticket</span>
	            </a>
	        </li>

			<li class="blue-dirty">
	            <a href="../../backup.php">
				<i class="tag-color black"></i>
	                <span class="lbl">Respaldo</span>
	            </a>
	        </li>

	        </li>
	    </ul>
</nav><!--.side-menu-->
 <?php
}else{
 ?>
<!-- ---------MENU DE NAVEGACION ---------- -->
<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
            <li class="red">
	            <a href="../Home/">
				<i class="tag-color green"></i>
	                <span class="lbl">Inicio</span>
	            </a>
	        </li>
            
			<li class="blue-dirty">
	            <a href="../Usuario/">
				<i class="font-icon font-icon-user"></i>
	                <span class="lbl">Usuarios</span>
	            </a>
	        </li>
			<li class="blue-dirty">
	            <a href="../ConsultarTicket/">
				<i class="tag-color orange"></i>
	                <span class="lbl">Consultar Ticket</span>
	            </a>
	        </li>

	        </li>
	    </ul>
</nav><!--.side-menu-->

<?php
}
?>

?>
