<?php
include('conexionn.php');

if (isset($_GET['nit'])) {
    $nit = $_GET['nit'];

    // Uso de consultas preparadas para prevenir inyecciones SQL
    $query = $conexion->prepare("DELETE FROM empresa WHERE nit = ?");
    $query->bind_param("s", $nit);

    if ($query->execute()) {
        echo '<script>alert("Empresa eliminada correctamente"); window.location = "../empresasdisp.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar la empresa"); window.location = "../empresasdisp.php";</script>';
    }
}