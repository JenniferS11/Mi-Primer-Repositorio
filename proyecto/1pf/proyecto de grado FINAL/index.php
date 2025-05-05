<?php

// Incluir la conexión de la base de datos
include('php/conexionn.php');
session_start();
     //Verificar que el usuario a iniciado sesión
if (!isset($_SESSION["usuario"])){
    echo '<script>alert("Por favor debes iniciar sesión");window.location = "login.php";</script>';;
    session_destroy();
    exit();
}
//Función para que salga usuario en el nav
$user = $_SESSION['usuario'];

$query_user = "SELECT usuario, nombre_completo FROM usuarios WHERE usuario='$user'";
$result_user = mysqli_query($conexion,$query_user);
if (mysqli_num_rows($result_user) == 0){
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="recursos/css/estilo.css">
	<title>Corporacion Universitaria Rafael Nuñez</title>
	<link rel="shortcut icon" href="recursos/imgs/logoisoornage_solid.svg">
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			
			<img src="recursos/imgs/prueba.svg" alt="">
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="Estudipract.php">
				<i class='bx bxs-group' ></i>
				<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="empresasdisp.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Empresas</span>
				</a>
			</li>

			<li>
				<a href="informes.php">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">informes</span>
				</a>
			</li>
			<li>
				
			</li>
		</ul>
		<ul class="side-menu">
		<li>
				
				</li>
			<li>
				<a href="php/salir.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<form id="search-form">
              <div class="form-input">
              <!--<input type="search" id="search-input" placeholder="Buscar...">
              <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>-->
             </div>
               </form>
			<!--<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>-->
			<a  class="profile">
				<!--<img src="assets/imgs/customer01.jpg" alt="">-->
				<span><?php echo $user; ?></span>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<a href="empresasdisp.php" class='bx bxs-doughnut-chart' ></a>
					<span class="text">
						<h3>Empresas</h3>
						<p>Añadir, borrar</p>
					</span>
				</li>
				<li>
					<a href="Estudipract.php" class='bx bxs-group' ></a>
					<span class="text">
						<h3>Estudiantes</h3>
						<p>Seguimiento de Estudiantes</p>
					</span>
				</li>
				<li>
					<a href="informes.php" class='bx bxs-cloud-download' ></a>
					<span class="text">
						<h3>Informes</h3>
						<p>Generar informes de Plan de trabajo por escenario de practicas</p>
					</span>
				</li>
			</ul>


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="recursos/js/main.js"></script>
</body>
</html>