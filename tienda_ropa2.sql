-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2024 a las 03:30:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";

SET NAMES utf8mb4;

--
-- Base de datos: `tienda_ropa2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
CREATE DATABASE Tienda_Ropa2;
USE Tienda_Ropa2;

CREATE TABLE `usuarios`
(
  id int
(11) NOT NULL,
  email varchar
(255) NOT NULL,
  nombreUsuario varchar
(255) NOT NULL,
  celular varchar
(20) DEFAULT NULL,
  contraseña` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Producto`
(
  `id_Producto` int
(11) AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar
(255) NOT NULL,
  `cantidad` varchar
(20) NOT NULL,
  `precio` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`
id`,
`email
`, `nombreUsuario`, `celular`, `contraseña`) VALUES
(3, 'liceo17montevideo@hotmail.com', 'Juan Lelo', '09888888', '$2y$10$oTh94JuJ/MJZSCnWFAf51O/mYP/zc/J1rMw6MmlqVjjas6Kh/yMnW'),
(5, 'acostacid@gmail.com', 'Julio Sosa', '099880000', '$2y$10$oPl.QpbqPG3/klNL.XObX.lq8EHtX9sxBs5LZ4ujEYfQKRKEAV5ty');

--
-- Índices para tablas volcadas
--

ALTER TABLE `usuarios`
ADD PRIMARY KEY
(`id`);
--
-- AUTO_INCREMENT de las tablas volcadas
--

ALTER TABLE `usuarios`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;