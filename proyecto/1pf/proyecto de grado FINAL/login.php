<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/login.css">
    <link rel="shortcut icon" href="recursos/imgs/logoisoornage_solid.svg">


</head>

<body>
    <main class="containerPadre">
        <div class="container1">

            <div class="caja__trasera">
                <div class="caja___traseralogin">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para ingresar</p>
                    <button id="bton__iniciar-sesion">Iniciar Sesión</button>

                </div>
                <div class="caja__traseraregistro">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate aquí para iniciar sesión</p>
                    <button id="bton__Registrarse">Regístrarse</button>
                </div>
            </div>

            <!-- Formulario de login y registro-->

            <div class="container__loginR">
                <!--Login-->
                <form action="php/usuarioo.php" method="POST" class="formulario__login">
                    <div><Img src="recursos/imgs/logocurn.png"></Img></div>
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Nombre de usuario o correo electrónico" name="correo_electronico">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <a href="index.php">
                        <button type="submit">Entrar</button>
                    </a>


                </form>
                <!--Registro-->
                <form action="php/registro.php" method="POST" class="formulario__registro">
                    <div><Img src="recursos/imgs/logocurn.png"></Img></div>
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" placeholder="Correo Electrónico" name="correo_electronico">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <input type="password" placeholder="Repetir Contraseña" name="contrasena">
                    <button type="submit">Regístrarse</button>

                </form>
            </div>
        </div>
    </main>
    <script>
    // JavaScript para manejar el modo oscuro
    document.addEventListener('DOMContentLoaded', function() {
        const themeStyle = document.getElementById('theme-style');

        // Verifica la preferencia guardada del usuario
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            themeStyle.setAttribute('href', savedTheme);
        } else {
            // Verifica la preferencia del sistema operativo
            const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)').matches;
            themeStyle.setAttribute('href', prefersDarkScheme ? 'recursos/css/dark-theme.css' : 'recursos/css/light-theme.css');
        }
    });

    // Maneja el cambio de tema si se implementa un botón o interruptor para alternar
    function toggleTheme() {
        const themeStyle = document.getElementById('theme-style');
        const currentTheme = themeStyle.getAttribute('href');
        const newTheme = currentTheme === 'recursos/css/light-theme.css' ? 'recursos/css/dark-theme.css' : 'recursos/css/light-theme.css';
        themeStyle.setAttribute('href', newTheme);
        localStorage.setItem('theme', newTheme);
    }

    // Ejemplo de cómo llamar a la función toggleTheme (puede ser desde un botón)
    document.getElementById('toggle-theme-button').addEventListener('click', toggleTheme);
</script>
    <script src="recursos/js/login.js"></script>
</body>

</html>