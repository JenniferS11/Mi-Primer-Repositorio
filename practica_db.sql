-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2025 a las 16:53:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nit` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `n_estudiantes_a` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nit`, `nombre`, `duracion`, `n_estudiantes_a`, `horario`) VALUES
('951753958', 'Suministros Landinez SAS', '4 meses', 2, '40 horas semanales'),
('951753971', 'RV Consultores Asociados', '4 meses', 4, '40 horas semanales'),
('952662562', 'BSNS México SA de CV México', '4 meses', 6, '40 horas semanales'),
('952753452', 'Chanaka México', '4 meses', 4, '40 horas semanales'),
('9563578688', 'ANTPACK SAS', '4 meses', 8, '40 horas semanales'),
('963589742', 'Movistar', '4 meses', 8, '40 horas semanales'),
('963595626', 'CURN- Departamento TIC- Auxiliar de Sistemas', '4 meses', 6, '40 horas semanales'),
('987456123', 'Tigo', '4 meses', 2, '40 horas semanales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `programa` varchar(300) NOT NULL,
  `nombres_completos` varchar(50) NOT NULL,
  `empresa` varchar(300) NOT NULL,
  `inicio_practica` date NOT NULL,
  `culminacion_practica` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `horas_completadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `programa`, `nombres_completos`, `empresa`, `inicio_practica`, `culminacion_practica`, `estado`, `horas_completadas`) VALUES
(1045678565, 'Tecnología en el Desarrollo de Sistemas de Información y de Software', 'Juan Camilo Mejia Caicedo', 'ANTPACK SAS', '2024-03-25', '2024-09-18', 'Terminado', 350),
(1047383833, 'Ingeniería de Sistemas', 'Juan David Iriarte', 'Surtigas SA', '2024-03-01', '2024-07-16', 'Pendiente', 10),
(1047383835, 'Ingeniería de Sistemas', 'Jennifer Sánchez', 'ANTPACK SAS', '2024-03-07', '2024-08-15', 'En Proceso', 410),
(1047383840, 'Tecnología', 'Juan David M.', 'Curn', '2024-02-14', '2024-07-14', 'Terminado', 400),
(1047383844, 'Ingeniería de Sistemas', 'Juan David', 'Hotel Esperanza AC', '2024-02-15', '2024-07-02', 'Terminado', 450),
(1047383852, 'Ingeniería de Sistemas', 'Daniel Muñoz', 'Surtigas SA', '2024-03-07', '2024-08-15', 'En Proceso', 490),
(1047383879, 'Ingeniería de Sistemas', 'Dayana Valdez', 'Hotel Esperanza AC', '2024-02-26', '2024-05-30', 'Terminado', 450),
(1052588965, 'Ingeniería de Sistemas', 'Juan David P.', 'ANTPACK', '2024-07-12', '2024-07-16', 'Terminado', 250),
(1052694566, 'Tecnología', 'Daniel Suarez', 'Hotel Esperanza AC', '2024-07-02', '2024-11-06', 'En Proceso', 300),
(1052698745, 'Ingeniería de Sistemas', 'Juan David Lopez', 'Yara', '2024-04-01', '2024-08-01', 'En Proceso', 200),
(1058967463, 'Tecnología', 'Ana Carrillo', 'Yara', '2024-05-01', '2024-09-05', 'En Proceso', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `correo_electronico`, `usuario`, `contrasena`) VALUES
(22, 'Jennifer Sánchez', 'jensagar08@gmail.com', 'Jenn', '123'),
(23, 'Jennifer Paola', 'Jenni@gmail.com', 'Jenn11', '456'),
(24, 'Dayana Valdez', 'dvaldezl21@curnvirtual.edu.co', 'dvaldezl21', '1234'),
(25, 'Leonardo J', 'leonardo1@gmail.com', 'Leonardoj1', '12345'),
(26, 'Jeferson Suarez', 'jsuarezb21@curnvirtual.edu.co', 'jsuarezb21', '456'),
(27, 'David A ', 'David03@gmail.com', 'David03', '789'),
(28, 'Daniela Donado', 'Daniela7@gmail.com', 'DanielaM07', '789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
