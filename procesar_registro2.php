<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $procesador = $_POST["procesador"];
    $ram = $_POST["ram"];
    $gabinete = $_POST["gabinete"];

    $sql = "INSERT INTO computadoras (procesador, ram, gabinete) VALUES ('$procesador', '$ram', '$gabinete')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro exitoso";
        $claseMensaje = "alert-success";
    } else {
        $mensaje = "Error al registrar: " . $conn->error;
        $claseMensaje = "alert-danger";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Página</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #283048, #859398); /* Fondo con un contraste de dos colores */
            color: #fff; /* Color del texto */
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="alert <?php echo $claseMensaje; ?>" role="alert">
        <?php echo $mensaje; ?>
    </div>
    <?php if (isset($mensaje) && $claseMensaje == 'alert-success'): ?>
        <button class="btn btn-primary" onclick="redirigir()">Verificae datos</button>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function redirigir() {
        // Puedes cambiar "otrapagina.php" por la URL de la página a la que deseas redirigir.
        window.location.href = "altas.php";
    }
</script>

</body>
</html>



