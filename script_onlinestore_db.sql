-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2022 a las 09:45:37
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
CREATE DATABASE IF NOT EXISTS `onlinestore_db` DEFAULT CHARACTER SET utf8mb4;
USE `onlinestore_db`;

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
(7, 'customer4', 'customer4', 'customer4@mail', 'customer4'),
(8, 'customer5', 'customer5', 'customer5@mail', 'customer5'),
(10, 'customer6', 'customer6', 'customer6@mail', 'customer6'),
(11, 'customer7', 'customer7', 'customer7@mail', 'customer77'),
(13, 'customer3', 'customer3', 'customer3@mail', 'customer3');

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
(1, 'prod1', 'prod1', 111, 0),
(2, 'prod2', 'prod2', 222, 222),
(5, 'prod3', 'prod3', 333, 300),
(7, 'prod7', 'prod7', 777, 777),
(8, 'prod12', 'prod12', 2, 2),
(9, 'prod13', 'prod13', 3, 6),
(10, 'prod14', 'prod14', 4, 4),
(11, 'prod15', 'prod15', 5, 5),
(12, 'prod16', 'prod16', 6, 6),
(17, 'prod18', 'prod18', 8, 8),
(18, 'prod19', 'prod19', 9, 9),
(20, 'prod110', 'prod120', 20, 0),
(21, 'prod111', 'prod111', 11, 1),
(22, 'CAMISA', 'CM1250', 29999, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE `sale` (
  `uid` int(8) UNSIGNED NOT NULL,
  `uidProduct` int(11) DEFAULT NULL,
  `uidCustomer` int(11) DEFAULT NULL,
  `nItems` int(8) NOT NULL,
  `totalPrice` int(8) NOT NULL,
  `saleDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sale`
--

INSERT INTO `sale` (`uid`, `uidProduct`, `uidCustomer`, `nItems`, `totalPrice`, `saleDate`) VALUES
(11, 5, 7, 3, 999, '2022-05-01'),
(16, 5, 8, 30, 8991, '2022-05-02'),
(17, 1, 1, 111, 11089, '2022-05-03'),
(18, 9, 13, 3, 9, '2022-05-04'),
(19, 22, 1, 100, 2699910, '2022-05-05'),
(20, 22, 7, 50, 1349955, '2022-05-06'),
(21, 20, 7, 10, 180, '2022-05-07'),
(22, 21, 11, 10, 99, '2022-05-07'),
(23, 22, 7, 50, 1349955, '2022-05-20');

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
-- Indices de la tabla `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `sale`
--
ALTER TABLE `sale`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
