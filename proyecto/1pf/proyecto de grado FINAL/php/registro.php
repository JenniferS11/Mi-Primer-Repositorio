<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Incluir la conexión a la base de datos
  include 'conexionn.php';

  // Creación de variables para la base de datos
  $nombre_completo = $_POST['nombre_completo'];
  $correo_electronico = $_POST['correo_electronico'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];

  // Verificar si algún campo está vacío
  if (empty($nombre_completo) || empty($correo_electronico) || empty($usuario) || empty($contrasena)) {
    echo '<script>
            alert("Todos los campos son obligatorios. Por favor, completa todos los campos.");
            window.location= "../login.php";
          </script>';
    exit();
  }

  // Para encriptar contraseñas en la base de datos
//$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

  // Verificar que el correo no esté repetido en la base de datos
  $verificar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_electronico='$correo_electronico'");

  if (mysqli_num_rows($verificar) > 0) {
    echo '<script>
            alert("El correo ya está registrado, intente con otro");
            window.location= "../login.php";
          </script>';
    exit();
  }

  // Verificar que el usuario no esté repetido en la base de datos
  $verificar_u = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");

  if (mysqli_num_rows($verificar_u) > 0) {
    echo '<script>
            alert("El usuario ya está registrado, intente con otro");
            window.location= "../login.php";
          </script>';
    exit();
  }

  // Insertar datos en la base de datos
  $query = "INSERT INTO usuarios(nombre_completo, correo_electronico, usuario, contrasena) 
          VALUES('$nombre_completo', '$correo_electronico', '$usuario', '$contrasena')"; //'$hashed_password')";

  $ejecutar = mysqli_query($conexion, $query);

  // Alertar que los datos han sido guardados satisfactoriamente
  if ($ejecutar) {
    echo '<script>
            alert("Usuario registrado con éxito");
            window.location= "../login.php";
          </script>';
  } else {
    echo '<script>
            alert("Error al registrar el usuario. Intente nuevamente.");
            window.location= "../login.php";
          </script>';
  }

  // Cerrar la conexión de la base de datos
  mysqli_close($conexion);



}