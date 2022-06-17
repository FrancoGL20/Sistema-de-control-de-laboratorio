-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 22:47:06
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_control_laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_lote` int(11) DEFAULT NULL,
  `numero_en_lote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id_certificado` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `fecha_certificado` date DEFAULT NULL,
  `id_analisis` int(11) DEFAULT NULL,
  `cantidad_en_tons` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_valores` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `puesto_de_contacto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_laboratorio`
--

CREATE TABLE `equipo_laboratorio` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `no_factura` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tiene_garantia` tinyint(1) DEFAULT NULL,
  `numero_garantia` varchar(100) DEFAULT NULL,
  `clave_mantenimiento` varchar(50) DEFAULT NULL,
  `fecha_ultimo_mantenimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id_lote` int(11) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `contenido` varchar(100) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_de_referencia`
--

CREATE TABLE `v_de_referencia` (
  `id_valores` int(11) NOT NULL,
  `resistencia` varchar(100) DEFAULT NULL,
  `hinchamiento` varchar(100) DEFAULT NULL,
  `amplitud` varchar(100) DEFAULT NULL,
  `hidratacion` varchar(100) DEFAULT NULL,
  `humedad` varchar(100) DEFAULT NULL,
  `esfuerzo` varchar(100) DEFAULT NULL,
  `absorcion` varchar(100) DEFAULT NULL,
  `estabilidad` varchar(100) DEFAULT NULL,
  `rendimiento` varchar(100) DEFAULT NULL,
  `ceniza` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`),
  ADD KEY `analisis_FK` (`id_lote`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `certificados_FK` (`id_cliente`),
  ADD KEY `certificados_FK_1` (`id_equipo`),
  ADD KEY `certificados_FK_2` (`id_analisis`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `clientes_FK_1` (`id_valores`);

--
-- Indices de la tabla `equipo_laboratorio`
--
ALTER TABLE `equipo_laboratorio`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_FK` (`id_tipo`);

--
-- Indices de la tabla `v_de_referencia`
--
ALTER TABLE `v_de_referencia`
  ADD PRIMARY KEY (`id_valores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_laboratorio`
--
ALTER TABLE `equipo_laboratorio`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `v_de_referencia`
--
ALTER TABLE `v_de_referencia`
  MODIFY `id_valores` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_FK` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id_lote`);

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `certificados_FK` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `certificados_FK_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo_laboratorio` (`id_equipo`),
  ADD CONSTRAINT `certificados_FK_2` FOREIGN KEY (`id_analisis`) REFERENCES `analisis` (`id_analisis`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_FK` FOREIGN KEY (`id_valores`) REFERENCES `valores_de_referencia` (`id_valores`),
  ADD CONSTRAINT `clientes_FK_1` FOREIGN KEY (`id_valores`) REFERENCES `v_de_referencia` (`id_valores`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_usuarios` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
