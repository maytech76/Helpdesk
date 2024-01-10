<?php

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "helpdesk";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Error de conexión: " . $conn->connect_error]));
}

// Nombre del archivo de respaldo
$backupFile = 'C:\Backup_db/backup.sql';


// Comando mysqldump
$command = "mysqldump --host=$servername --user=$username --password=$password --databases $database > $backupFile";

// Ejecutar el comando
exec($command);

// Cerrar la conexión
$conn->close();

// Enviar respuesta al cliente
echo json_encode(["success" => true]);
?>