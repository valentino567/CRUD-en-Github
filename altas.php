<?php
require_once("conexion.php");

// Consulta SQL para obtener todas las computadoras
$sql = "SELECT `id`, `procesador`, `ram`, `gabinete` FROM `computadoras`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Computadoras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6nA/D6IjJ4bapFqjmeVdA2bB9PdP1eZ" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #3498db, #e74c3c);
            color: #fff;
            margin: 0;
        }
        .container {
            margin-top: 50px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #fff;
            color: #000;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #3498db;
        }
        td {
            background-color: #ecf0f1;
        }
        .btn-modificar,
        .btn-eliminar {
            width: 30px;
            height: 30px;
            cursor: pointer;
            margin-right: 5px;
        }
    </style>
     <!-- Agrega esto dentro de la etiqueta head -->
     <script>
        function eliminarComputadora(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta computadora?")) {
                // Redirecciona a la página que manejará la eliminación
                window.location.href = 'eliminar_computadora.php?id=' + id;
            }
        }
        function editarComputadora(id) {
            window.location.href = 'editar_computadora.php?id=' + id;
        }
    </script>
</head>
<body>

    <div class="container">
        <h2>Computadoras Registradas</h2>

        <?php
        if ($result->num_rows > 0) {
            // Mostrar los resultados en una tabla
            echo "<table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Procesador</th>
                            <th>RAM</th>
                            <th>Gabinete</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['procesador']}</td>
                        <td>{$row['ram']}</td>
                        <td>{$row['gabinete']}</td>
                        <td>
                        <a href='javascript:void(0);' onclick='eliminarComputadora({$row['id']});'>
                            <img src='eliminar.png' class='btn-eliminar' title='Eliminar'>
                            </a>
                            <a href='javascript:void(0);' onclick='editarComputadora({$row['id']});'>
                            <img src='modificar.png' class='btn-modificar' title='Modificar'>
                            </a>
                        </td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No hay computadoras registradas.";
        }
        ?>

<button onclick="window.location.href='index.html'" class="btn btn-primary mt-3 btn-lg btn-block">Agregar otra computadora</button>


    </div>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>

