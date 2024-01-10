<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rutaBackup = $_POST['ruta_backup']; // Suponiendo que tienes un campo de formulario llamado 'ruta_backup'.

    // Realiza la conexión a la base de datos (debes configurar las credenciales).
    $conexion = new mysqli('localhost', 'root', '', 'helpdesk');

    if ($conexion->connect_error) {
        die('Error de conexión a la base de datos: ' . $conexion->connect_error);
    }

    // Inserta la ruta del archivo en la base de datos.
    $sql = "INSERT INTO rutas_backup (ruta) VALUES ('$rutaBackup')";

    if ($conexion->query($sql) === TRUE) {
        echo 'Ruta de backup guardada con éxito.';
    } else {
        echo 'Error al guardar la ruta de backup: ' . $conexion->error;
    }

    $conexion->close();
}
?>
