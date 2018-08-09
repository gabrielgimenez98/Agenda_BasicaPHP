-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: 20-Jul-2018 às 00:17
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcontatos`
--

CREATE TABLE `tbcontatos` (
  `idContato` bigint(20) NOT NULL,
  `nomeContato` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbemail`
--

CREATE TABLE `tbemail` (
  `idContato` bigint(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tipoEmail` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefone`
--

CREATE TABLE `tbtelefone` (
  `idContato` bigint(20) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `tipoTelefone` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcontatos`
--
ALTER TABLE `tbcontatos`
  ADD PRIMARY KEY (`idContato`);

--
-- Indexes for table `tbemail`
--
ALTER TABLE `tbemail`
  ADD KEY `idContato` (`idContato`);

--
-- Indexes for table `tbtelefone`
--
ALTER TABLE `tbtelefone`
  ADD KEY `idContato` (`idContato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcontatos`
--
ALTER TABLE `tbcontatos`
  MODIFY `idContato` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbemail`
--
ALTER TABLE `tbemail`
  ADD CONSTRAINT `tbemail_ibfk_1` FOREIGN KEY (`idContato`) REFERENCES `tbcontatos` (`idContato`);

--
-- Limitadores para a tabela `tbtelefone`
--
ALTER TABLE `tbtelefone`
  ADD CONSTRAINT `tbtelefone_ibfk_1` FOREIGN KEY (`idContato`) REFERENCES `tbcontatos` (`idContato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
