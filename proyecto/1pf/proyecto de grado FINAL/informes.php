<?php
session_start();
//Incluir la conexion a la base de datos
include('php/conexionn.php');
//Verificar que el usuario a iniciado sesión
if (!isset($_SESSION["usuario"])) {
	echo '<script>alert("Por favor debes iniciar sesión");window.location = "login.php";</script>';
	;
	session_destroy();
	exit();
}
//Función para que salga usuario en el nav
$user = $_SESSION['usuario'];
$query_user = "SELECT usuario, nombre_completo FROM usuarios WHERE usuario='$user'";
$result_user = mysqli_query($conexion, $query_user);
if (mysqli_num_rows($result_user) == 0) {
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

	<script src="recursos/js/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="recursos/js/app.js"></script>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">

			<img src="recursos/imgs/prueba.svg" alt="">
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="Estudipract.php">
					<i class='bx bxs-group'></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>

			<li>
				<a href="empresasdisp.php">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Empresas</span>
				</a>
			</li>
			<li class="active">
				<a href="informes.php">
					<i class='bx bxs-cloud-download'></i>
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
				<a href="login" class="logout">
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
			<i class='bx bx-menu'></i>

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
			<a class="profile">
				<!--<img src="assets/imgs/customer01.jpg" alt="">-->
				<span><?php echo $user; ?></span>
			</a>
		</nav>
		<!-- NAVBAR -->

				

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Informes</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="informes.php">Informes</a>
						</li>
					</ul>
				</div>
				
			</div>

			


			

<div class="table-data">
				<div class="order">
					
				<div class="contenedor">
<div class="box-contenedor">

<center><img src="recursos/imgs/logocurn.png" alt="">
<center><h2>Plan de trabajo por escenario de practicas</h2></center>
<div class="contenedor">

<div class="box-contenedor">

   
<form id="form">
                    <br><div class="contorls">
                     <label for="escenario" class="form-label"><p>Escenario de practicas</p></label>
                       <select class="controls" id="escenario" required>
                            <option value="">Seleccione un Escenario</option>
                          	<!--Hace que al momento de registrar una empresa en la página de empresas
			aparezacn automaticamente acá en la página de informes-->
													<?php
													$query_empresas = "SELECT nombre FROM empresa";
													$result_empresas = mysqli_query($conexion, $query_empresas);

													if (mysqli_num_rows($result_empresas) > 0) {
														while ($empresa = mysqli_fetch_assoc($result_empresas)) {
															echo '<option value="' . htmlspecialchars($empresa['nombre']) . '">' . htmlspecialchars($empresa['nombre']) . '</option>';
														}
													} else {
														echo '<option value="">No hay empresas disponibles</option>';
													}

													mysqli_free_result($result_empresas);
													?>
												</select>

                    </div></br>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div>
                                <label for="" class="form-label">Tipo de Practicas</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tipopracticas" class="form-check-input"
                                        id="tipopracticas-pr" value="2">
                                    <label for="tipopracticas-pr" class="form-check-label">Profesionales</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tipopracticas" class="form-check-input"
                                        id="tipopracticas-em" value="1">
                                    <label for="tipopracticas-en" class="form-check-label">Empresariales</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tipopracticas" class="form-check-input"
                                        id="tipopracticas-pe" value="0" checked>
                                    <label for="tipopracticas-pe" class="form-check-label">Pedagogicas/Investigativas</label>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <br><div class="mb-3">
                        <label for="semestre" class="form-label">Semestre de la Practica</label>
                        <input type="text" class="controls" id="semestre" required>
                    </div></br>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fechainicio" class="form-label">Fecha Inicio</label>
                            <input type="text" class="controls" id="fechainicio" required>
                        </div>
                      <br>  <div class="col-md-6">
                            <label for="fechafin" class="form-label">Fecha Culminación</label>
                            <input type="text" class="controls" id="fechafin" required>
                        </div></br>
                    </div>

                   

                   
                    
					<span class="d-block pb-2"></span>
										<div class="signature mb-2" style="width: 0%; height: 0px;">
											<canvas id="signature-canvas" style="/* border: 1px dashed red; 
					*/width: 0%;height: 0px;touch-action: none;" height="2" width="2"></canvas>
										</div>


										<br> <button class="btn">Generar PDF</button></br>

										</form>




</div>

</div>    
			</div>
	

	<script src="recursos/js/main.js"></script>
</body>
</html>