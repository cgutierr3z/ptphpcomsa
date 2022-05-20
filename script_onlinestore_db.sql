-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2022 a las 01:53:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `onlinestore_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `uid` int(8) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`uid`, `fname`, `lname`, `email`, `address`) VALUES
(1, 'customer1', 'customer1', 'customer1@mail', 'customer1'),
(3, 'customer2', 'customer2', 'customer2@mail', 'customer2'),
(4, 'customer3', 'customer3', 'customer3@mail', 'customer3'),
(7, 'customer4', 'customer4', 'customer4@mail', 'customer4'),
(8, 'customer5', 'customer5', 'customer5@mail', 'customer5'),
(10, 'customer6', 'customer6', 'customer6@mail', 'customer6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `uid` int(8) UNSIGNED NOT NULL,
  `pname` varchar(100) NOT NULL,
  `refcode` varchar(100) NOT NULL,
  `price` int(8) NOT NULL,
  `stock` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`uid`, `pname`, `refcode`, `price`, `stock`) VALUES
(1, 'prod1', 'prod1', 111, 111),
(2, 'prod2', 'prod2', 222, 222),
(5, 'prod3', 'prod3', 333, 333),
(7, '1', '1', 1, 1),
(8, '2', '2', 2, 2),
(9, '3', '3', 3, 3),
(10, '4', '4', 4, 4),
(11, '5', '5', 5, 5),
(12, '6', '6', 6, 6),
(17, '8', '8', 8, 8),
(18, '9', '9', 9, 9),
(20, '10', '20', 20, 10),
(21, '11', '11', 11, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`uid`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
