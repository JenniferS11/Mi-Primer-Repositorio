<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir la conexión a la base de datos
    include 'conexionn.php';

    // Creación de variables para la base de datos
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $n_estudiantes_a = $_POST['n_estudiantes_a'];
    $horario = $_POST['horario'];

    // Verificar si se enviaron los datos del formulario
    if (empty($nit) || empty($nombre) || empty($duracion) || empty($n_estudiantes_a) || empty($horario)) {
        echo '<script>
                alert("Por favor, complete todos los campos.");
                window.location.href = "../empresasdisp.php";
              </script>';
        exit;
    }

    // Verificar si el NIT ya existe en la base de datos
    $verificar = mysqli_prepare($conexion, "SELECT * FROM empresa WHERE nit=?");
    mysqli_stmt_bind_param($verificar, "s", $nit);
    mysqli_stmt_execute($verificar);
    mysqli_stmt_store_result($verificar);
    if (mysqli_stmt_num_rows($verificar) > 0) {
        echo '<script>
                alert("El número de NIT ya existe en la base de datos.");
                window.location = "../empresasdisp.php";
              </script>';
        exit();
    }

    // Insertar datos en la base de datos usando consulta preparada
    $query = "INSERT INTO empresa (nit, nombre, duracion, n_estudiantes_a, horario) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $nit, $nombre, $duracion, $n_estudiantes_a, $horario);
    $ejecucion = mysqli_stmt_execute($stmt);

    // Verificar si la inserción fue exitosa
    if ($ejecucion) {
        echo '<script>
                alert("Empresa registrada con éxito");
                window.location = "../empresasdisp.php";
              </script>';
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

    // Cerrar la conexión de la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}
