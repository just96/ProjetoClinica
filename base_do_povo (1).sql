-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jan-2017 às 19:22
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id_consultas` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `Medico` varchar(255) NOT NULL,
  `Especialidade` varchar(255) NOT NULL,
  `DataConsulta` date NOT NULL,
  `HoraConsulta` varchar(255) NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `registo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `consultas`:
--   `id_user`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contacto` int(255) NOT NULL,
  `DataNascimento` date NOT NULL,
  `BI_CC` int(255) NOT NULL,
  `registo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consultas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consultas` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
