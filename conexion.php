<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "github";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

?>

