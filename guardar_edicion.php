<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado los datos del formulario
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        $procesador = $_POST['procesador'];
        $ram = $_POST['ram'];
        $gabinete = $_POST['gabinete'];

        // Actualiza los datos en la base de datos
        $sql = "UPDATE `computadoras` SET 
                `procesador` = '$procesador', 
                `ram` = '$ram', 
                `gabinete` = '$gabinete' 
                WHERE `id` = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Los cambios se guardaron correctamente.</h1>";
        } else {
            echo "<h1>Error al guardar los cambios: " . $conn->error . "</h1>";
        }
    } else {
        echo "<h1>ID de computadora no válido.</h1>";
    }
} else {
    header("Location: index.html");
    exit();  // Asegura que el script se detenga después de redirigir
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Edición</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6nA/D6IjJ4bapFqjmeVdA2bB9PdP1eZ" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #3498db, #e74c3c);
            color: #fff;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .btn-redirect {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="altas.php" class="btn btn-primary btn-lg btn-redirect">Volver</a>
    </div>
</body>
</html>


