<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir la conexión de la base de datos
    include('conexionn.php');

    // Crear variables para la base de datos
    $id = $_POST['id'];
    $programa = $_POST['programa'];
    $nombres_completos = $_POST['nombres_completos'];
    $empresa = $_POST['empresa'];
    $inicio_practica = $_POST['inicio_practica'];
    $culminacion_practica = $_POST['culminacion_practica'];
    $estado = $_POST['estado'];
    $horas_completadas = $_POST['horas_completadas'];

    // Verificar si se enviaron los datos del formulario
    if (
        empty($id) || empty($programa) || empty($nombres_completos) || empty($empresa)
        || empty($inicio_practica) || empty($culminacion_practica)
        || empty($estado) || empty($horas_completadas)
    ) {
        echo '<script>
            alert("Por favor, complete todos los campos.");
            window.location.href = "../Estudipract.php";
        </script>';
        exit;
    }

    // Verificar que el número de identidad tenga hasta 10 caracteres
    if (strlen($id) != 10) { // Cambiado de > 10 a != 10 para verificar exactamente 10 caracteres
        echo '<script>
            alert("El número de identidad debe tener exactamente 10 caracteres.");
            window.location = "../Estudipract.php";
        </script>';
        exit();
    }

    // Verificar si el ID ya existe en la base de datos
    $verificar = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE id='$id'");
    if (mysqli_num_rows($verificar) > 0) {
        echo '<script>
            alert("El número de identidad ya existe en la base de datos.");
            window.location = "../Estudipract.php";
        </script>';
        exit();
    }

    // Iniciar una transacción
    mysqli_begin_transaction($conexion);

    try {
        // Insertar datos en la tabla estudiantes
        $query_estudiantes = "INSERT INTO estudiantes (id, programa, nombres_completos, empresa, inicio_practica, culminacion_practica, estado, horas_completadas) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_estudiantes = mysqli_prepare($conexion, $query_estudiantes);
        mysqli_stmt_bind_param($stmt_estudiantes, "issssssi", $id, $programa, $nombres_completos, $empresa, $inicio_practica, $culminacion_practica, $estado, $horas_completadas);
        mysqli_stmt_execute($stmt_estudiantes);

        // Confirmar la transacción
        mysqli_commit($conexion);

        echo '<script>
                alert("Estudiante registrado con éxito");
                window.location = "../Estudipract.php";
              </script>';
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        mysqli_rollback($conexion);
        echo '<script>
                alert("Error: ' . $e->getMessage() . '");
                window.location = "../Estudipract.php";
              </script>';
    }

    // Cerrar la conexión de la base de datos
    mysqli_close($conexion);
}
