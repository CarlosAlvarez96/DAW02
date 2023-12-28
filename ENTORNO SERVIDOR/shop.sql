-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 17:54:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `line`
--

CREATE TABLE `line` (
  `idProduct` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `lot` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `line`
--

INSERT INTO `line` (`idProduct`, `idPedido`, `lot`, `state`) VALUES
(1, 1, 3, 1),
(1, 2, 1, 1),
(2, 1, 4, 1),
(1, 3, 1, 1),
(2, 3, 7, 1),
(1, 4, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `total` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idUser`, `state`, `datetime`, `total`) VALUES
(1, 1, 1, '2023-11-10 13:07:58', 214.96),
(2, 2, 1, '2023-11-10 13:34:33', 24.99),
(3, 1, 1, '2023-11-10 13:13:36', 269.92),
(4, 1, 0, '0000-00-00 00:00:00', 0.00),
(5, 2, 0, '0000-00-00 00:00:00', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`, `stock`) VALUES
(1, 'Blasphemous', 'Metroidvania español donde siendo el Penitente, liberaremos Cvstodia del pecado.', 'Blasphemous-2-Bitwares.png', 24.99, 65),
(2, 'Blasphemous 2', 'Segunda entrega del mejor juego español, destrona a su predecesor.', 'blasphemous-2-review-bosses.jpg', 34.99, 49),
(3, 'Hollow Knight', 'Salva Hallownest del destello', 'circo del silksong.jpg', 15.99, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `rol`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(2, 'User1', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'User2', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'User3', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(5, 'User4', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
