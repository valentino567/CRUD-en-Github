<?php
require_once("conexion.php");

// Resto del código...
// Verifica si se proporciona un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Recupera los datos de la computadora según el ID
    $sql = "SELECT * FROM `computadoras` WHERE `id` = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Aquí puedes mostrar un formulario para editar los datos de la computadora
        // Puedes usar los valores de $row para prellenar el formulario
    } else {
        echo "No se encontró la computadora con ID $id.";
    }
} else {
    echo "ID de computadora no válido.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #ffcccb, #c3bef0); /* Cambia los colores según tus preferencias */
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Agrega aquí el formulario para editar los datos -->
    <form action="guardar_edicion.php" method="post">
        <!-- Campos del formulario -->
        <div class="form-group">
            <label for="procesador">Procesador:</label>
            <input type="text" class="form-control" name="procesador" value="<?php echo $row['procesador']; ?>">
        </div>

        <div class="form-group">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" name="ram" value="<?php echo $row['ram']; ?>">
        </div>

        <div class="form-group">
            <label for="gabinete">Gabinete:</label>
            <input type="text" class="form-control" name="gabinete" value="<?php echo $row['gabinete']; ?>">
        </div>

        <!-- Agrega aquí más campos según tus necesidades -->

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


