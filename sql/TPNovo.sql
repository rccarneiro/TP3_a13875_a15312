-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18-Jun-2018 às 02:07
-- Versão do servidor: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TPNovo`
--
CREATE DATABASE IF NOT EXISTS `TPNovo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TPNovo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Administrador`
--

DROP TABLE IF EXISTS `Administrador`;
CREATE TABLE IF NOT EXISTS `Administrador` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Administrador`
--

INSERT INTO `Administrador` (`ID`, `Nome`, `Email`, `Password`) VALUES
(1, 'Admin', 'user@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aulas`
--

DROP TABLE IF EXISTS `Aulas`;
CREATE TABLE IF NOT EXISTS `Aulas` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL,
  `Start` datetime(6) NOT NULL,
  `End` datetime(6) NOT NULL,
  `Capacidade` int(2) NOT NULL,
  `Treinador_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Disponibilidade`
--

DROP TABLE IF EXISTS `Disponibilidade`;
CREATE TABLE IF NOT EXISTS `Disponibilidade` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Disponibilidade`
--

INSERT INTO `Disponibilidade` (`ID`, `Descrição`) VALUES
(3, 'Livre'),
(4, 'Ocupado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text CHARACTER SET utf8,
  `uid` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Treinador_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `uid`, `Treinador_ID`) VALUES
(12, '2018-06-18 10:00:00', '2018-06-18 13:00:00', 'Aula ABS', '949710acc8153c106ba33aad1cb485ef', NULL),
(13, '2018-06-19 11:00:00', '2018-06-19 13:00:00', 'Aula Cycling', '949710acc8153c106ba33aad1cb485ef', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensalidades`
--

DROP TABLE IF EXISTS `Mensalidades`;
CREATE TABLE IF NOT EXISTS `Mensalidades` (
  `ID` int(11) NOT NULL,
  `Descrição` varchar(255) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Valor` double(8,2) NOT NULL,
  `Status_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Mensalidades`
--

INSERT INTO `Mensalidades` (`ID`, `Descrição`, `Data`, `Valor`, `Status_ID`, `User_ID`) VALUES
(3, 'Mensalidade JAN', '31-01-2018', 25.00, 1, 19),
(4, 'Mensalidade JAN', '31-01-2018', 25.00, 2, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Plano_Treino`
--

DROP TABLE IF EXISTS `Plano_Treino`;
CREATE TABLE IF NOT EXISTS `Plano_Treino` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` text NOT NULL,
  `uid` varchar(100) NOT NULL,
  `Treinador_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Status_Pagamento`
--

DROP TABLE IF EXISTS `Status_Pagamento`;
CREATE TABLE IF NOT EXISTS `Status_Pagamento` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Status_Pagamento`
--

INSERT INTO `Status_Pagamento` (`ID`, `Nome`) VALUES
(1, 'Pago'),
(2, 'Não Pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Treinadores`
--

DROP TABLE IF EXISTS `Treinadores`;
CREATE TABLE IF NOT EXISTS `Treinadores` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Contacto` int(9) NOT NULL,
  `Disponibilidade_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Treinadores`
--

INSERT INTO `Treinadores` (`ID`, `Nome`, `Contacto`, `Disponibilidade_ID`) VALUES
(23, 'Antonio Mendes', 918443747, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Contacto` int(9) NOT NULL,
  `Peso` float(10,2) NOT NULL,
  `Altura` float(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`ID`, `Nome`, `Email`, `Password`, `Contacto`, `Peso`, `Altura`) VALUES
(19, 'Ricardo', 'rcarneiropro@gmail.com', '25f9e794323b453885f5181f1b624d0b', 912388751, 76.00, 1.79),
(20, 'Zé', 'ze@gmail.com', '25f9e794323b453885f5181f1b624d0b', 912381746, 86.00, 1.76),
(21, 'Ricardo', 'ric@gmail.com', '25f9e794323b453885f5181f1b624d0b', 912887498, 87.00, 1.89),
(22, 'Manuel', 'manuel@gmail.com', '25f9e794323b453885f5181f1b624d0b', 918876264, 87.00, 1.78),
(23, 'ana gonçalves', 'ana@gmail.com', '25f9e794323b453885f5181f1b624d0b', 918443756, 56.00, 1.67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users_Plano`
--

DROP TABLE IF EXISTS `Users_Plano`;
CREATE TABLE IF NOT EXISTS `Users_Plano` (
  `User_ID` int(11) NOT NULL,
  `Plano_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Aulas`
--
ALTER TABLE `Aulas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Treinador_ID` (`Treinador_ID`);

--
-- Indexes for table `Disponibilidade`
--
ALTER TABLE `Disponibilidade`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Treinador_ID` (`Treinador_ID`);

--
-- Indexes for table `Mensalidades`
--
ALTER TABLE `Mensalidades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_mensalidade` (`User_ID`),
  ADD KEY `Status_ID` (`Status_ID`);

--
-- Indexes for table `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Treinador_ID` (`Treinador_ID`);

--
-- Indexes for table `Status_Pagamento`
--
ALTER TABLE `Status_Pagamento`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Treinadores`
--
ALTER TABLE `Treinadores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Disponibilidade_ID` (`Disponibilidade_ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

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
-- AUTO_INCREMENT for table `Administrador`
--
ALTER TABLE `Administrador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Aulas`
--
ALTER TABLE `Aulas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Disponibilidade`
--
ALTER TABLE `Disponibilidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Mensalidades`
--
ALTER TABLE `Mensalidades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Status_Pagamento`
--
ALTER TABLE `Status_Pagamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Treinadores`
--
ALTER TABLE `Treinadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Treinador_ID`) REFERENCES `Treinadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Mensalidades`
--
ALTER TABLE `Mensalidades`
  ADD CONSTRAINT `FK_mensalidade` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `mensalidades_ibfk_1` FOREIGN KEY (`Status_ID`) REFERENCES `Status_Pagamento` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Plano_Treino`
--
ALTER TABLE `Plano_Treino`
  ADD CONSTRAINT `plano_treino_ibfk_1` FOREIGN KEY (`Treinador_ID`) REFERENCES `Treinadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Treinadores`
--
ALTER TABLE `Treinadores`
  ADD CONSTRAINT `FK_treinador_disponibilidade` FOREIGN KEY (`Disponibilidade_ID`) REFERENCES `Disponibilidade` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Users_Plano`
--
ALTER TABLE `Users_Plano`
  ADD CONSTRAINT `user_fk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_plano_ibfk_1` FOREIGN KEY (`Plano_ID`) REFERENCES `Plano_Treino` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
