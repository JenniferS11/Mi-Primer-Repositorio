<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    include 'conexionn.php';

    // Verificar si se enviaron los datos del formulario
    if (empty($_POST['correo_electronico']) || empty($_POST['contrasena'])) {
        echo '<script>
            alert("Por favor, complete todos los campos.");
            window.location.href = "../login.php";
          </script>';
        exit;
    }

    //Definicion de variables 
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];

    //
    $validacion_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE (correo_electronico='$correo_electronico' OR usuario='$correo_electronico')  AND contrasena='$contrasena'");

    if (mysqli_num_rows($validacion_login) > 0) {
        // Iniciar sesión y redirigir al usuario si las credenciales son correctas
        $_SESSION['usuario'] = $correo_electronico;
        mysqli_close($conexion); // Cerrar la conexión a la base de datos

        header("location: ../index.php");
        exit;
    } else {
        // Mostrar mensaje de error y redirigir al usuario si las credenciales son incorrectas
        mysqli_close($conexion); // Cerrar la conexión a la base de datos

        echo '<script>
            alert("El usuario no existe o la contraseña es incorrecta. Verifique sus datos.");
            window.location.href = "../login.php";
          </script>';
        exit;
    }


}





