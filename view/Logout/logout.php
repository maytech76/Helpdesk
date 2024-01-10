<?php
    require_once("../../config/conexion.php");
    session_destroy();
    header("location:".Conectar::ruta()."index.php");
    exit();

?>