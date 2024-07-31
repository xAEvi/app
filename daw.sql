-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 12:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daw`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE DATABASE daw;

USE daw;

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `valoracion_costo` int(11) NOT NULL,
  `valoracion_ubicacion` int(11) NOT NULL,
  `valoracion_estado` int(11) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `id_usuario`, `id_propiedad`, `comentario`, `fecha`, `valoracion_costo`, `valoracion_ubicacion`, `valoracion_estado`, `estado`) VALUES
(2, 27, 3, 'La propiedad es excelente, muy bien ubicada.', '2024-07-20', 5, 5, 5, 'Activo'),
(3, 28, 3, 'Buena propiedad, pero el costo es un poco alto.', '2024-07-21', 4, 4, 4, 'Activo'),
(4, 29, 3, 'La propiedad está bien, aunque podría tener mejor mantenimiento.', '2024-07-22', 3, 4, 3, 'Activo'),
(5, 30, 3, 'La ubicación es ideal, pero el estado podría mejorar.', '2024-07-23', 4, 5, 3, 'Activo'),
(6, 31, 3, 'Todo bien, aunque me gustaría un descuento en el alquiler.', '2024-07-24', 4, 4, 4, 'Activo'),
(7, 32, 3, 'Excelente propiedad, muy cómoda y bien ubicada.', '2024-07-25', 5, 5, 5, 'Activo'),
(8, 33, 3, 'Me gusta la propiedad, pero el costo es un poco alto.', '2024-07-26', 3, 4, 3, 'Activo'),
(9, 34, 3, 'La propiedad está bien, pero hay algunos problemas con el mantenimiento.', '2024-07-27', 4, 3, 3, 'Activo'),
(10, 35, 3, 'Muy buena propiedad en general, aunque el costo podría ser menor.', '2024-07-28', 4, 4, 4, 'Activo'),
(11, 36, 3, 'Buena propiedad, pero el estado podría ser mejor.', '2024-07-29', 3, 4, 3, 'Activo'),
(12, 37, 3, 'Me encanta la propiedad, muy bien ubicada y en buen estado.', '2024-07-30', 5, 5, 5, 'Activo'),
(13, 38, 3, 'La ubicación es perfecta, pero el mantenimiento necesita atención.', '2024-07-31', 4, 5, 3, 'Activo'),
(14, 39, 3, 'Buena propiedad, pero hay algunos problemas con el costo.', '2024-08-01', 3, 4, 3, 'Activo'),
(15, 40, 3, 'Todo está bien, aunque el mantenimiento podría ser mejor.', '2024-08-02', 4, 4, 4, 'Activo'),
(16, 41, 3, 'La propiedad es excelente, pero el costo es un poco alto.', '2024-08-03', 4, 5, 3, 'Activo'),
(17, 27, 3, 'Me encanta la propiedad, muy cómoda y bien mantenida.', '2024-08-04', 5, 5, 5, 'Activo'),
(18, 28, 3, 'La ubicación es muy buena, pero el costo es algo elevado.', '2024-08-05', 4, 5, 3, 'Activo'),
(19, 29, 3, 'Propiedad adecuada, pero el mantenimiento podría ser mejor.', '2024-08-06', 3, 4, 3, 'Activo'),
(20, 30, 3, 'Buena propiedad en una excelente ubicación.', '2024-08-07', 4, 5, 4, 'Activo'),
(21, 31, 3, 'La propiedad está bien, aunque el costo es un poco alto.', '2024-08-08', 4, 4, 4, 'Activo'),
(22, 32, 3, 'Excelente en general, aunque el estado podría ser mejor.', '2024-08-09', 5, 4, 4, 'Activo'),
(23, 33, 3, 'Buena propiedad, pero hay algunos problemas con el mantenimiento.', '2024-08-10', 4, 3, 3, 'Activo'),
(24, 34, 3, 'Muy cómoda y bien ubicada, aunque el costo es un poco elevado.', '2024-08-11', 4, 5, 3, 'Activo'),
(25, 35, 3, 'La propiedad es excelente, pero el costo es algo alto.', '2024-08-12', 4, 5, 3, 'Activo'),
(26, 36, 3, 'La ubicación es perfecta, pero el estado necesita mejoras.', '2024-08-13', 3, 5, 3, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_mantenimiento` varchar(255) NOT NULL,
  `encargado` varchar(255) NOT NULL,
  `estado` enum('Activo','Inactivo','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `id_propiedad`, `fecha_inicio`, `fecha_fin`, `descripcion`, `nombre_mantenimiento`, `encargado`, `estado`) VALUES
(2, 3, '2024-01-01', '2024-01-15', 'Revisión general del sistema de plomería.', 'Mantenimiento de plomería', 'Juan Pérez', 'Activo'),
(3, 4, '2024-02-01', '2024-02-10', 'Pintura exterior del edificio.', 'Pintura exterior', 'Ana Gómez', 'Activo'),
(4, 5, '2024-03-01', '2024-03-05', 'Cambio de aire acondicionado.', 'Reemplazo de aire acondicionado', 'Luis Martínez', 'Activo'),
(5, 6, '2024-04-01', '2024-04-20', 'Revisión y ajuste del sistema eléctrico.', 'Revisión eléctrica', 'Sofía Rodríguez', 'Activo'),
(6, 7, '2024-05-01', '2024-05-10', 'Mantenimiento de jardines y áreas verdes.', 'Mantenimiento de jardines', 'Carlos López', 'Activo'),
(7, 8, '2024-06-01', '2024-06-15', 'Inspección y reparación de ventanas.', 'Reparación de ventanas', 'María Fernández', 'Activo'),
(8, 9, '2024-07-01', '2024-07-10', 'Revisión del sistema de seguridad.', 'Revisión de seguridad', 'Pedro González', 'Activo'),
(9, 10, '2024-08-01', '2024-08-20', 'Mantenimiento de la piscina.', 'Mantenimiento de piscina', 'Laura Torres', 'Activo'),
(10, 11, '2024-09-01', '2024-09-10', 'Limpieza profunda de alfombras.', 'Limpieza de alfombras', 'Jorge Silva', 'Activo'),
(11, 12, '2024-10-01', '2024-10-05', 'Reparación de grifería en baños.', 'Reparación de grifería', 'Cristina Morales', 'Activo'),
(12, 13, '2024-11-01', '2024-11-15', 'Inspección del sistema de calefacción.', 'Inspección de calefacción', 'Ricardo Fernández', 'Activo'),
(13, 14, '2024-12-01', '2024-12-10', 'Reparación de techos.', 'Reparación de techos', 'Verónica Díaz', 'Activo'),
(14, 15, '2024-01-05', '2024-01-20', 'Revisión y mantenimiento de sistemas de riego.', 'Mantenimiento de riego', 'Héctor Ramírez', 'Activo'),
(15, 16, '2024-02-05', '2024-02-15', 'Inspección y reparación de cerraduras.', 'Reparación de cerraduras', 'Elena Romero', 'Activo'),
(16, 17, '2024-03-05', '2024-03-15', 'Mantenimiento de la red eléctrica.', 'Mantenimiento eléctrico', 'Julio López', 'Activo'),
(17, 18, '2024-04-05', '2024-04-20', 'Revisión de sistemas de ventilación.', 'Revisión de ventilación', 'Daniela Castro', 'Activo'),
(18, 19, '2024-05-05', '2024-05-15', 'Reparación de paredes y pintura.', 'Reparación y pintura', 'Andrés Ortega', 'Activo'),
(19, 20, '2024-06-05', '2024-06-20', 'Mantenimiento del sistema de calefacción.', 'Mantenimiento de calefacción', 'Paola Morales', 'Activo'),
(20, 21, '2024-07-05', '2024-07-15', 'Revisión de sistemas de alarma.', 'Revisión de alarma', 'Mónica Vargas', 'Activo'),
(21, 22, '2024-08-05', '2024-08-20', 'Mantenimiento general del inmueble.', 'Mantenimiento general', 'Esteban López', 'Activo'),
(22, 3, '2024-09-05', '2024-09-15', 'Revisión y reparación de sistemas de fontanería.', 'Reparación de fontanería', 'Laura Muñoz', 'Activo'),
(23, 4, '2024-10-05', '2024-10-15', 'Limpieza de sistemas de aire acondicionado.', 'Limpieza de aire acondicionado', 'Fernando Ruiz', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `duracion_alquiler` int(11) NOT NULL,
  `estado_pedido` enum('Pendiente','Aceptado','Rechazado') NOT NULL,
  `fecha_inicio` date NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `estado` enum('Activo','Inactivo','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `id_usuario`, `id_propiedad`, `fecha_pedido`, `duracion_alquiler`, `estado_pedido`, `fecha_inicio`, `tipo_pago`, `estado`) VALUES
(2, 27, 3, '2024-07-15', 12, 'Pendiente', '2024-08-01', 'Mensual', 'Activo'),
(3, 28, 4, '2024-07-16', 6, 'Aceptado', '2024-08-01', 'Anual', 'Activo'),
(4, 29, 5, '2024-07-17', 24, 'Rechazado', '2024-09-01', 'Mensual', 'Activo'),
(5, 30, 6, '2024-07-18', 12, 'Pendiente', '2024-08-15', 'Anual', 'Activo'),
(6, 31, 7, '2024-07-19', 18, 'Aceptado', '2024-09-01', 'Mensual', 'Activo'),
(7, 32, 8, '2024-07-20', 6, 'Pendiente', '2024-08-05', 'Mensual', 'Activo'),
(8, 33, 9, '2024-07-21', 12, 'Aceptado', '2024-09-01', 'Anual', 'Activo'),
(9, 34, 10, '2024-07-22', 24, 'Rechazado', '2024-10-01', 'Mensual', 'Activo'),
(10, 35, 11, '2024-07-23', 6, 'Pendiente', '2024-08-10', 'Mensual', 'Activo'),
(11, 36, 12, '2024-07-24', 12, 'Aceptado', '2024-09-15', 'Anual', 'Activo'),
(12, 37, 13, '2024-07-25', 18, 'Rechazado', '2024-08-20', 'Mensual', 'Activo'),
(13, 38, 14, '2024-07-26', 24, 'Pendiente', '2024-09-05', 'Anual', 'Activo'),
(14, 39, 15, '2024-07-27', 12, 'Aceptado', '2024-08-25', 'Mensual', 'Activo'),
(15, 40, 16, '2024-07-28', 6, 'Pendiente', '2024-08-30', 'Mensual', 'Activo'),
(16, 41, 17, '2024-07-29', 18, 'Aceptado', '2024-09-10', 'Anual', 'Activo'),
(17, 27, 18, '2024-07-30', 24, 'Rechazado', '2024-10-01', 'Mensual', 'Activo'),
(18, 28, 19, '2024-07-31', 12, 'Pendiente', '2024-08-15', 'Mensual', 'Activo'),
(19, 29, 20, '2024-08-01', 6, 'Aceptado', '2024-08-20', 'Mensual', 'Activo'),
(20, 30, 3, '2024-08-02', 12, 'Rechazado', '2024-09-01', 'Anual', 'Activo'),
(21, 31, 4, '2024-08-03', 24, 'Pendiente', '2024-10-01', 'Mensual', 'Activo'),
(22, 32, 5, '2024-08-04', 6, 'Aceptado', '2024-08-25', 'Mensual', 'Activo'),
(23, 33, 6, '2024-08-05', 12, 'Rechazado', '2024-09-15', 'Anual', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `propiedad`
--

CREATE TABLE `propiedad` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo_propiedad` enum('Casa','Departamento','Oficina','Penthouse','Bodega') NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` longblob NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `num_habitaciones` int(11) NOT NULL,
  `num_banos` int(11) NOT NULL,
  `superficie` decimal(10,2) NOT NULL,
  `estado_alquiler` enum('Disponible','Alquilado') NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propiedad`
--

INSERT INTO `propiedad` (`id`, `titulo`, `tipo_propiedad`, `descripcion`, `imagen`, `direccion`, `precio`, `num_habitaciones`, `num_banos`, `superficie`, `estado_alquiler`, `estado`) VALUES
(3, 'Casa en la playa', 'Casa', 'Hermosa casa con vista al mar y acceso directo a la playa.', '', 'Av. del Mar 123, Guayaquil', 350000.00, 4, 3, 250.00, 'Disponible', 'Activo'),
(4, 'Departamento céntrico', 'Departamento', 'Departamento moderno en el corazón de la ciudad.', '', 'Calle Central 456, Quito', 150000.00, 2, 1, 80.00, 'Disponible', 'Activo'),
(5, 'Oficina en el centro', 'Oficina', 'Oficina amplia con excelente ubicación.', '', 'Av. 9 de Octubre 789, Guayaquil', 200000.00, 0, 1, 120.00, 'Disponible', 'Activo'),
(6, 'Penthouse de lujo', 'Penthouse', 'Penthouse exclusivo con terraza privada y vistas panorámicas.', '', 'Calle de los Sueños 101, Quito', 500000.00, 3, 3, 300.00, 'Disponible', 'Activo'),
(7, 'Casa de campo', 'Casa', 'Casa con amplio jardín y espacio para eventos.', '', 'Ruta del Valle 202, Cuenca', 270000.00, 5, 4, 350.00, 'Disponible', 'Activo'),
(8, 'Departamento en el sector norte', 'Departamento', 'Departamento cómodo y accesible en el sector norte de la ciudad.', '', 'Calle 10 202, Quito', 120000.00, 3, 2, 90.00, 'Disponible', 'Activo'),
(9, 'Oficina moderna', 'Oficina', 'Oficina equipada con tecnología de punta.', '', 'Av. Amazonas 303, Quito', 180000.00, 0, 1, 110.00, 'Disponible', 'Activo'),
(10, 'Penthouse con piscina', 'Penthouse', 'Penthouse con piscina privada y gimnasio.', '', 'Calle de los Árboles 404, Guayaquil', 600000.00, 4, 4, 320.00, 'Disponible', 'Activo'),
(11, 'Casa en el barrio residencial', 'Casa', 'Casa en un tranquilo barrio residencial.', '', 'Calle de la Paz 505, Cuenca', 220000.00, 4, 2, 280.00, 'Disponible', 'Activo'),
(12, 'Departamento amueblado', 'Departamento', 'Departamento totalmente amueblado y listo para habitar.', '', 'Av. Eloy Alfaro 606, Guayaquil', 140000.00, 2, 1, 85.00, 'Disponible', 'Activo'),
(13, 'Oficina en edificio corporativo', 'Oficina', 'Oficina en un prestigioso edificio corporativo.', '', 'Av. del Parque 707, Quito', 250000.00, 0, 1, 150.00, 'Disponible', 'Activo'),
(14, 'Penthouse con vista al río', 'Penthouse', 'Penthouse con vista al río y acabados de lujo.', '', 'Calle de los Ríos 808, Guayaquil', 550000.00, 3, 3, 290.00, 'Disponible', 'Activo'),
(15, 'Casa en el campo', 'Casa', 'Casa de campo con amplios espacios y jardín.', '', 'Ruta 45, Loja', 230000.00, 4, 3, 260.00, 'Disponible', 'Activo'),
(16, 'Departamento económico', 'Departamento', 'Departamento económico en zona accesible.', '', 'Calle 8 909, Guayaquil', 100000.00, 2, 1, 75.00, 'Disponible', 'Activo'),
(17, 'Oficina con buena iluminación', 'Oficina', 'Oficina con excelente iluminación natural.', '', 'Av. Libertador 1010, Quito', 160000.00, 0, 1, 100.00, 'Disponible', 'Activo'),
(18, 'Penthouse en zona exclusiva', 'Penthouse', 'Penthouse en una de las zonas más exclusivas de la ciudad.', '', 'Calle de la Exclusividad 1111, Guayaquil', 700000.00, 4, 4, 350.00, 'Disponible', 'Activo'),
(19, 'Casa en área urbana', 'Casa', 'Casa en una zona urbana muy accesible.', '', 'Calle de la Urbe 1212, Quito', 190000.00, 3, 2, 220.00, 'Disponible', 'Activo'),
(20, 'Departamento con terraza', 'Departamento', 'Departamento con una amplia terraza.', '', 'Av. del Sol 1313, Cuenca', 170000.00, 3, 2, 100.00, 'Disponible', 'Activo'),
(21, 'Oficina en zona industrial', 'Oficina', 'Oficina en una zona industrial con fácil acceso.', '', 'Calle Industrial 1414, Guayaquil', 130000.00, 0, 1, 85.00, 'Disponible', 'Activo'),
(22, 'Penthouse con jacuzzi', 'Penthouse', 'Penthouse con jacuzzi y vistas impresionantes.', '', 'Calle de los Lujo 1515, Quito', 650000.00, 4, 4, 310.00, 'Disponible', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `imagen` longblob NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contrasena`, `username`, `correo`, `imagen`, `direccion`, `rol`, `estado`) VALUES
(22, 'Pedro Morales', 'adminpass1', 'pedrom', 'pedromorales@example.com', '', 'Av. de los Shyris 123, Quito', 1, 'Activo'),
(23, 'María Fernández', 'adminpass2', 'mariaf', 'mariafernandez@example.com', '', 'Calle La Pradera 456, Guayaquil', 1, 'Activo'),
(24, 'Luis Gómez', 'modpass1', 'luisg', 'luisgomez@example.com', '', 'Calle 12 de Octubre 789, Quito', 2, 'Activo'),
(25, 'Ana Rodríguez', 'modpass2', 'anar', 'anarodriguez@example.com', '', 'Avenida 9 de Octubre 234, Guayaquil', 2, 'Activo'),
(26, 'Carlos Vásquez', 'modpass3', 'carlosv', 'carlosvasquez@example.com', '', 'Calle Bolivariana 345, Cuenca', 2, 'Activo'),
(27, 'Sofía Moreno', 'clientpass1', 'sofia', 'sofia.moreno@example.com', '', 'Calle de los Ríos 567, Quito', 3, 'Activo'),
(28, 'Juan Pérez', 'clientpass2', 'juanp', 'juan.perez@example.com', '', 'Av. de los Shyris 789, Quito', 3, 'Activo'),
(29, 'Isabela López', 'clientpass3', 'isabelal', 'isabela.lopez@example.com', '', 'Calle Gran Colombia 123, Guayaquil', 3, 'Activo'),
(30, 'Ricardo Castro', 'clientpass4', 'ricardoc', 'ricardo.castro@example.com', '', 'Calle 9 de Octubre 456, Guayaquil', 3, 'Activo'),
(31, 'Daniela Gómez', 'clientpass5', 'danielag', 'daniela.gomez@example.com', '', 'Av. de las Américas 789, Quito', 3, 'Activo'),
(32, 'José Martínez', 'clientpass6', 'josem', 'jose.martinez@example.com', '', 'Calle Rumiñahui 234, Cuenca', 3, 'Activo'),
(33, 'Valeria Herrera', 'clientpass7', 'valeriah', 'valeria.herrera@example.com', '', 'Calle José de Antepara 567, Guayaquil', 3, 'Activo'),
(34, 'Miguel Silva', 'clientpass8', 'miguel', 'miguel.silva@example.com', '', 'Av. 6 de Diciembre 123, Quito', 3, 'Activo'),
(35, 'Natalia García', 'clientpass9', 'natalia', 'natalia.garcia@example.com', '', 'Calle Los Andes 456, Cuenca', 3, 'Activo'),
(36, 'Santiago Bravo', 'clientpass10', 'santiagob', 'santiago.bravo@example.com', '', 'Calle Quito 789, Guayaquil', 3, 'Activo'),
(37, 'María José Delgado', 'clientpass11', 'mariadelgado', 'maria.delgado@example.com', '', 'Av. Las Orquídeas 234, Quito', 3, 'Activo'),
(38, 'Alejandro Martínez', 'clientpass12', 'alejandrom', 'alejandro.martinez@example.com', '', 'Calle Manuel Córdova Galarza 567, Cuenca', 3, 'Activo'),
(39, 'Laura Paredes', 'clientpass13', 'laurap', 'laura.paredes@example.com', '', 'Calle Pichincha 123, Guayaquil', 3, 'Activo'),
(40, 'Felipe Ramírez', 'clientpass14', 'feliper', 'felipe.ramirez@example.com', '', 'Av. de la República 456, Quito', 3, 'Activo'),
(41, 'Gabriela López', 'clientpass15', 'gabrielal', 'gabriela.lopez@example.com', '', 'Calle de la Alborada 789, Guayaquil', 3, 'Activo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- Indexes for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- Indexes for table `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id`);

--
-- Constraints for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
