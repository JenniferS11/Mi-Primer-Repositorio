<?php
include('conexionn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conexion->prepare("DELETE FROM estudiantes WHERE id=?");
    $query->bind_param("s", $id);

    if ($query->execute()) {
        echo '<script>alert("Estudiante eliminado exitosamente"); window.location = "../Estudipract.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el estudiante"); window.location = "../Estudipract.php";</script>';
    }


}
