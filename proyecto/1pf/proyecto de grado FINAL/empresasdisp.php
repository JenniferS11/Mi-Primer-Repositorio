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
// Conectar a la base de datos y ejecutar una consulta SELECT
$query_select = "SELECT * FROM empresa";
$resultado = mysqli_query($conexion, $query_select);

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
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
			<li class="active">
				<a href="empresasdisp.php">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Empresas</span>
				</a>
			</li>

			<li>
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
				<a href="php/salir.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
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
					<h1>Empresas</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="empresasdisp.php">Empresas</a>
						</li>
					</ul>
				</div>
				<div class="boton-modal">
					<label for="btn-modal">
						Añadir Empresa
					</label>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Listado de Empresas</h3>
						<!--<i class='bx bx-search' ></i>-->
						<!--<i class='bx bx-filter' ></i>-->
						<div class="search-container">
							<input type="text" id="search-input" placeholder="Buscar por empresa...">
						</div>
					</div>

					<!--Tabla de empresas-->

					<table id="tablax">
						<thead>
							<tr>
								<th>Nit</th>
								<th>Nombre</th>
								<th>Duración de la Práctica</th>
								<th>Estudiantes Asignados</th>
								<th>Horario</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody id="table-body">
							<?php
							// Verificar si se obtuvieron resultados
							if (mysqli_num_rows($resultado) > 0) {
								// Iterar sobre cada fila de resultados
								while ($fila = mysqli_fetch_assoc($resultado)) {
									echo "<tr class='row'>";
									echo "<td><b>" . htmlspecialchars($fila['nit']) . "</b></td>";
									echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
									echo "<td>" . htmlspecialchars($fila['duracion']) . "</td>";
									echo "<td>" . htmlspecialchars($fila['n_estudiantes_a']) . "</td>";
									echo "<td>" . htmlspecialchars($fila['horario']) . "</td>";
									echo "<td class='actions'>
									<a href='php/editar_empresa.php?nit=" . htmlspecialchars($fila['nit']) . "' 
									class='edit'><span class='material-symbols-outlined'>edit</span></a>
									<a href='#' onclick='confirmDeletion(\"" . htmlspecialchars($fila['nit']) . "\")' 
									class='delete'><span class='material-symbols-outlined'>delete</span></a>
								  </td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><th colspan='4'>No hay empresas registradas.</th></tr>";
							}

							// Liberar el resultado
							mysqli_free_result($resultado);

							// Cerrar la conexión
							mysqli_close($conexion);
							?>


						</tbody>
					</table>

					<!-- Paginación -->
					<div id="paginacion" class="paginacion">
						<button id="prev-page" disabled>Anterior</button>
						<span id="page-info"></span>
						<button id="next-page">Siguiente</button>
					</div>


					<!--Ventana Modal // Para registro de empresas-->
					<input type="checkbox" id="btn-modal">
					<div class="container-modal">
						<div class="content-modal">
							<section class="form-register">
								<!--<a href="empresasdisp.php">
		   <span class="material-symbols-outlined">close</span></a>-->
								<Img src="recursos/imgs/logocurn.png"></Img>
								<h4>Registro Empresa</h4>
								<form action="php/registrar_empresa.php" method="POST">
									<input class="controls" type="text" name="nit" id="" maxlength="10"
										placeholder="Nit">
									<input class="controls" type="text" name="nombre" id="" placeholder="Nombre">
									<input class="controls" type="text" name="duracion" id=""
										placeholder="Duración de la práctica">
									<input class="controls" type="text" name="n_estudiantes_a" id=""
										placeholder="Número estudiantes asignados">
									<input class="controls" type="text" name="horario" id="" placeholder="Horario">

									<a href="empresasdisp.php">
										<button type="submit">Registrar</button>
									</a>
								</form>
							</section>

						</div>
					</div>
				</div>


		</main>
		<!-- MAIN -->
	</section>
	<!--Alerta para confirmar que en realidad quiere eliminar una empresa-->
	<script>
		function confirmDeletion(nit) {
			const confirmation = confirm("¿Estás seguro de que quieres eliminar esta empresa?");
			if (confirmation) {
				window.location.href = `php/eliminar_empresa.php?nit=${nit}`;
			}
		}
	</script>
	<!-- Hacer funcionar el buscador-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// Obtener el input del buscador y la tabla
			const searchInput = document.getElementById('search-input');
			const table = document.getElementById('tablax');
			const rows = table.getElementsByTagName('tr');
			const noResultsMessage = document.createElement('tr'); // Crear fila para el mensaje

			noResultsMessage.innerHTML = `<td colspan="${rows[0].cells.length}" style="text-align: center;">No se encontraron resultados</td>`;
			noResultsMessage.style.display = 'none'; // Inicialmente oculto
			table.appendChild(noResultsMessage); // Agregar el mensaje al final de la tabla

			// Agregar un event listener al campo de búsqueda
			searchInput.addEventListener('keyup', function () {
				const filter = searchInput.value.toLowerCase(); // Obtener el texto en minúsculas
				let matchFound = false; // Bandera para verificar si hay coincidencias

				for (let i = 1; i < rows.length - 1; i++) { // Evitar el encabezado y la fila del mensaje
					let cells = rows[i].getElementsByTagName('td');
					let match = false;

					for (let j = 0; j < cells.length; j++) {
						if (cells[j]) {
							let cellText = cells[j].textContent || cells[j].innerText;
							if (cellText.toLowerCase().indexOf(filter) > -1) {
								match = true;
								break;
							}
						}
					}

					rows[i].style.display = match ? '' : 'none'; // Mostrar/ocultar filas
					if (match) {
						matchFound = true; // Si hay coincidencia, activar la bandera
					}
				}

				// Mostrar/ocultar el mensaje de "No se encontraron resultados"
				noResultsMessage.style.display = matchFound ? 'none' : '';
			});
		});
	</script>
	<!--Hacer funcionar la paginacion-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const rowsPerPage = 5; // Número de filas por página
			const table = document.getElementById('tablax');
			const rows = table.getElementsByTagName('tr');
			const paginacion = document.getElementById('paginacion');
			const totalRows = rows.length - 1; // Descontamos el encabezado
			const totalPages = Math.ceil(totalRows / rowsPerPage);

			let currentPage = 1;

			function displayPage(page) {
				const start = (page - 1) * rowsPerPage + 1; // +1 para ignorar encabezado
				const end = page * rowsPerPage;
				for (let i = 1; i < rows.length; i++) { // Empezamos en 1 para evitar el encabezado
					if (i >= start && i <= end) {
						rows[i].style.display = ''; // Mostrar filas
					} else {
						rows[i].style.display = 'none'; // Ocultar filas
					}
				}
				updatePaginacion(page);
			}

			function updatePaginacion(page) {
				paginacion.innerHTML = ''; // Limpiar botones de paginación

				// Botón "Anterior"
				const prevBtn = document.createElement('button');
				prevBtn.innerText = 'Anterior';
				prevBtn.disabled = (page === 1); // Deshabilitar si es la primera página
				prevBtn.addEventListener('click', function () {
					if (currentPage > 1) {
						currentPage--;
						displayPage(currentPage);
					}
				});
				paginacion.appendChild(prevBtn);

				// Botones de número de página
				for (let i = 1; i <= totalPages; i++) {
					const btn = document.createElement('button');
					btn.innerText = i;
					btn.className = (i === page) ? 'active' : '';
					btn.addEventListener('click', function () {
						currentPage = i;
						displayPage(i);
					});
					paginacion.appendChild(btn);
				}

				// Botón "Siguiente"
				const nextBtn = document.createElement('button');
				nextBtn.innerText = 'Siguiente';
				nextBtn.disabled = (page === totalPages); // Deshabilitar si es la última página
				nextBtn.addEventListener('click', function () {
					if (currentPage < totalPages) {
						currentPage++;
						displayPage(currentPage);
					}
				});

				paginacion.appendChild(nextBtn);
			}


			// Inicializar la primera página
			displayPage(currentPage);
		});

	</script>
	<script src="recursos/js/main.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>