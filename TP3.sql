-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Maio-2018 às 23:24
-- Versão do servidor: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TP3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aulas`
--

CREATE TABLE IF NOT EXISTS `Aulas` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL,
  `Horario` varchar(255) NOT NULL,
  `Capacidade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pacotes`
--

CREATE TABLE IF NOT EXISTS `Pacotes` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL,
  `Custo` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Plano_Treino`
--

CREATE TABLE IF NOT EXISTS `Plano_Treino` (
  `ID` int(11) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Hora` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Aula_ID` int(11) NOT NULL,
  `Treinador_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Treinadores`
--

CREATE TABLE IF NOT EXISTS `Treinadores` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Contacto` int(9) NOT NULL,
  `Disponibilidade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` binary(32) NOT NULL,
  `Contacto` int(9) NOT NULL,
  `Peso` float(3,2) NOT NULL,
  `Altura` float(2,2) NOT NULL,
  `Pacote_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aulas`
--
ALTER TABLE `Aulas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Pacotes`
--
ALTER TABLE `Pacotes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Aula_ID` (`Aula_ID`),
  ADD KEY `Treinador_ID` (`Treinador_ID`);

--
-- Indexes for table `Treinadores`
--
ALTER TABLE `Treinadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pacote_ID` (`Pacote_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Aulas`
--
ALTER TABLE `Aulas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Pacotes`
--
ALTER TABLE `Pacotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Treinadores`
--
ALTER TABLE `Treinadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  ADD CONSTRAINT `plano_treino_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plano_treino_ibfk_2` FOREIGN KEY (`Aula_ID`) REFERENCES `Aulas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plano_treino_ibfk_3` FOREIGN KEY (`Treinador_ID`) REFERENCES `Treinadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Pacote_ID`) REFERENCES `Pacotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
