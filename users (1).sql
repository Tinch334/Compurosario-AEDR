-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 06:09:22
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
-- Base de datos: `tres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email_verif_code` text NOT NULL,
  `account_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `num_of_logs` int(11) NOT NULL DEFAULT 0,
  `last_log` datetime DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `email_verif_code`, `account_verified`, `is_blocked`, `num_of_logs`, `last_log`, `id`) VALUES
('santi_zanin', 'zaninsantino@gmail.com', '$2y$10$auluKLRAmBy7LivQyD9pbOgFOoeROPevF.9RuB6lpRtNNkR5pHH7a', 'ba8c98b6566cb6d4fa332ecc64097cb24174', 1, 0, 0, '2022-06-12 16:02:22', 18),
('Pepe', 'screadores122@gmail.com', '$2y$10$NwS/SDTSXPtiixB9l0OllOkX1BCU02H4nAQcfWXChQlNeCFohZ31O', '88fc9bddcfccb99236aa8c53405152cb4764', 1, 0, 0, '2022-06-16 15:21:29', 31),
('joaco', 'joaquinvergara070@gmail.com', '$2y$10$nsFzmopKg7iGGsmtwTxr1OjEorfEfkrtB9jFroiLcRSARl86BAW3W', '75f5b3b6e863a791f3784b8d97cd98778740', 1, 1, 0, NULL, 32),
('mapache_420', 'juani.bertoni73@gmail.com', '$2y$10$A0iX3EiUTbNLOU3cO2AQYeayVqUNnCy8pbe6gM.lkRdUkcDHdRCw2', 'b49326d248bd23ef2bd88724e5b5bee88091', 1, 0, 0, '2022-06-12 19:41:53', 33),
('Mari', 'marianelaclara@gmail.com', '$2y$10$gtKCUSyYqOFSTdZ4KPbZD.Md.k.Ze5044.2nYA0HUNAJalJdUhMiS', '4f3db128575b521822fd0d8eb8a07ecc9941', 1, 0, 0, '2022-06-13 09:05:43', 37),
('<script>window.alert(\"Hola\");</script>', 'ygkhuwcolsrpxejaho@kvhrr.com', '$2y$10$/pZRVK8yRtmPoe4Q8Drq5uINaBY6/JTHilEBF3groG7J/yV.8hyWK', 'a774d078d00c41e69f183bbf60a5e3d61826', 0, 0, 0, NULL, 38),
('miguelito', 'wasif.miguel@ironflys.com', '$2y$10$szjlzS5bLPG3XnL2uiZfHu0npg65MxPUo7IHFNyPvOhPkaxMlujM2', 'd2d00e0580d7513bf0f2b3c6e065fb80180', 1, 0, 0, '2022-06-18 20:50:11', 39),
('holido', 'holido8537@mahazai.com', '$2y$10$ZKGzBO1gQ.ZFesgh992.s.IOy3gEV62qMaVcBst2pJMfQFcgzIeAe', '0be15765a74dc3d8c7a74efb69eaa2c92263', 1, 0, 0, '2022-10-15 06:07:35', 40);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
