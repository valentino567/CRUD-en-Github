<?php
require_once("conexion.php");

// Verifica si se proporciona el parámetro 'id'
if (isset($_GET['id'])) {
    // Escapa el valor del parámetro para evitar SQL injection
    $id = $conn->real_escape_string($_GET['id']);

    // Consulta SQL para eliminar la computadora con el ID proporcionado
    $sql = "DELETE FROM `computadoras` WHERE `id` = $id";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el registro: " . $conn->error;
    }
} else {
    $mensaje = "ID no proporcionado.";
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación de Computadora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6nA/D6IjJ4bapFqjmeVdA2bB9PdP1eZ" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #3498db, #e74c3c);
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #27ae60;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2 class="display-4">Resultado de la Eliminación</h2>
            <p class="lead"><?php echo $mensaje; ?></p>
            <hr class="my-4">
            <!-- Agrega un botón para redirigir a otra página -->
            <a href="altas.php" class="btn btn-custom btn-lg">Volver</a>
        </div>
    </div>
</body>
</html>

