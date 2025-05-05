<?php
include('conexionn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM estudiantes WHERE id='$id'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $programa = $row['programa'];
        $nombres_completos = $row['nombres_completos'];
        $empresa = $row['empresa'];
        $horas_completadas = $row['horas_completadas'];
        $inicio_practica = $row['inicio_practica'];
        $culminacion_practica = $row['culminacion_practica'];
        $estado = $row['estado'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $programa = $_POST['programa'];
    $nombres_completos = $_POST['nombres_completos'];
    $empresa = $_POST['empresa'];
    $horas_completadas = $_POST['horas_completadas'];
    $inicio_practica = $_POST['inicio_practica'];
    $culminacion_practica = $_POST['culminacion_practica'];
    $estado = $_POST['estado'];

    $query = "UPDATE estudiantes SET programa='$programa', nombres_completos='$nombres_completos', 
    empresa='$empresa', horas_completadas='$horas_completadas', inicio_practica='$inicio_practica', 
    culminacion_practica='$culminacion_practica', estado='$estado' WHERE id='$id'";
    mysqli_query($conexion, $query);

    echo '<script>alert("Estudiante actualizado exitosamente"); window.location = "../Estudipract.php";</script>';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../recursos/imgs/logoisoornage_solid.svg">
    <link rel="stylesheet" href="../recursos/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Editar datos del estudiante</title>

</head>

<body>
    <div class="container">
        <img src="../recursos/imgs/logocurn.png">
        <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <h2>Editar Estudiante</h2>
            <input type="hidden" name="id" placeholder="Número de Identificación" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="programa" placeholder="Programa" value="<?php echo $programa; ?>">
            <input type="text" name="nombres_completos" placeholder="Nombre Completo"
                value="<?php echo $nombres_completos; ?>">
            <input type="text" name="empresa" placeholder="Nombre de la empresa" value="<?php echo $empresa; ?>">
            <input type="text" name="horas_completadas" placeholder="Horas Completadas"
                value="<?php echo $horas_completadas; ?>">
            <input type="date" name="inicio_practica" value="<?php echo $inicio_practica; ?>">
            <input type="date" name="culminacion_practica" value="<?php echo $culminacion_practica; ?>">
            <select name="estado">
                <option value="Estado" <?php echo $estado == 'Estado' ? 'selected' : ''; ?>>Estado</option>
                <option value="Terminado" <?php echo $estado == 'Terminado' ? 'selected' : ''; ?>>Terminado</option>
                <option value="Pendiente" <?php echo $estado == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="En Proceso" <?php echo $estado == 'En Proceso' ? 'selected' : ''; ?>>En proceso</option>
            </select>
            <input class="botons" type="submit" name="update" value="Actualizar">
        </form>
    </div>

</body>

</html>