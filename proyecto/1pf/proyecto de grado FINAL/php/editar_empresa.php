<?php
include('conexionn.php');

if (isset($_GET['nit'])) {
    $nit = $_GET['nit'];
    $query = "SELECT * FROM empresa WHERE nit='$nit'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nit = $row['nit'];
        $nombre = $row['nombre'];
        $duracion = $row['duracion'];
        $n_estudiantes_a = $row['n_estudiantes_a'];
        $horario = $row['horario'];
    }
}

if (isset($_POST['update'])) {
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $n_estudiantes_a = $_POST['n_estudiantes_a'];
    $horario = $_POST['horario'];

    $query = "UPDATE empresa SET nombre= '$nombre', duracion='$duracion', n_estudiantes_a ='$n_estudiantes_a',
     horario= '$horario' WHERE nit = '$nit'";
    mysqli_query($conexion, $query);

    echo '<script>alert("Empresa actualizada exitosamente"); window.location = "../empresasdisp.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../recursos/imgs/logoisoornage_solid.svg">
    <link rel="stylesheet" href="../recursos/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Editar datos de empresas</title>
</head>

<body>
    <div class="container">
        <img src="../recursos/imgs/logocurn.png">
        <form action="editar_empresa.php?nit=<?php echo $_GET['nit']; ?>" method="POST">
            <h2>Editar Empresa</h2>
            <input type="hidden" name="nit" placeholder="Nit de la empresa" value="<?php echo $_GET['nit']; ?>">
            <input type="text" name="nombre" placeholder="Nombre de la empresa" value="<?php echo $nombre; ?>">
            <input type="text" name="duracion" placeholder="Duración de la práctica" value="<?php echo $duracion; ?>">
            <input type="text" name="n_estudiantes_a" placeholder="Número de Estudiantes"
                value="<?php echo $n_estudiantes_a; ?>">
            <input type="text" name="horario" placeholder="Horario" value="<?php echo $horario; ?>">

            <input class="botons" type="submit" name="update" value="Actualizar"></a>
        </form>
    </div>
</body>

</html>