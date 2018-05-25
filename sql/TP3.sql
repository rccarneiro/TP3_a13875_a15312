-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24-Maio-2018 às 21:47
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
  `Horario` datetime(6) NOT NULL,
  `Capacidade` int(2) NOT NULL,
  `Treinador_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensalidades`
--

CREATE TABLE IF NOT EXISTS `Mensalidades` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Valor` double(8,2) NOT NULL,
  `Status` varchar(255) NOT NULL
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
  `Data` datetime(6) NOT NULL,
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
  `Password` varchar(30) NOT NULL,
  `Contacto` int(9) NOT NULL,
  `Peso` float(10,2) NOT NULL,
  `Altura` float(5,2) NOT NULL,
  `Pacote_ID` int(11) DEFAULT NULL,
  `Mensalidade_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`ID`, `Nome`, `Email`, `Password`, `Contacto`, `Peso`, `Altura`, `Pacote_ID`, `Mensalidade_ID`) VALUES
(2, 'Ricardo Carneiro', 'rcar@gmail.com', '123456789', 911000111, 9.99, 0.99, NULL, NULL),
(3, 'Ricardo Carneiro', 'qwe@gmail.com', '123456789', 910001123, 9.99, 0.99, NULL, NULL),
(4, 'Ricardo', '1234556@gmail.com', '123456789', 910001234, 100.00, 1.90, NULL, NULL),
(5, 'Ricardo', 'asdx@hotmail.com', 'cardoso96', 123445679, 98.00, 1.67, NULL, NULL),
(6, 'Ricardo', 'asf@gmail.com', '25f9e794323b453885f5181f1b624d', 911223187, 12.00, 1.67, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users_Plano`
--

CREATE TABLE IF NOT EXISTS `Users_Plano` (
  `User_ID` int(11) NOT NULL,
  `Plano_ID` int(11) NOT NULL
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
-- Indexes for table `Mensalidades`
--
ALTER TABLE `Mensalidades`
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
  ADD KEY `Treinador_ID` (`Treinador_ID`),
  ADD KEY `FK_PersonOrder` (`Aula_ID`);

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
  ADD KEY `Pacote_ID` (`Pacote_ID`),
  ADD KEY `mensalidade_idfk_1` (`Mensalidade_ID`);

--
-- Indexes for table `Users_Plano`
--
ALTER TABLE `Users_Plano`
  ADD KEY `user_fk_1` (`User_ID`),
  ADD KEY `plano_fk_1` (`Plano_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Aulas`
--
ALTER TABLE `Aulas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Mensalidades`
--
ALTER TABLE `Mensalidades`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Mensalidades`
--
ALTER TABLE `Mensalidades`
  ADD CONSTRAINT `mensalidades_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Users` (`Mensalidade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`Aula_ID`) REFERENCES `Aulas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plano_treino_ibfk_3` FOREIGN KEY (`Treinador_ID`) REFERENCES `Treinadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `mensalidade_idfk_1` FOREIGN KEY (`Mensalidade_ID`) REFERENCES `Mensalidade` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Pacote_ID`) REFERENCES `Pacotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Users_Plano`
--
ALTER TABLE `Users_Plano`
  ADD CONSTRAINT `plano_fk_1` FOREIGN KEY (`Plano_ID`) REFERENCES `Plano_Treino` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
