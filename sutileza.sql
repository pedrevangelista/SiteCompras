-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2018 às 20:57
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sutileza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `sexo`, `telefone`, `celular`, `email`, `senha`, `cidade`, `cep`, `estado`, `endereco`) VALUES
('12345678901', 'valdomiro dos santos', 'm', '123456789012345', '123456789012345', 'admin', 'admin', 'matchos laime', '123456789', 'fudido', 'rua cu bairro buceta 666'),
('14224244640', 'Lucas Khaled Rocha Brugger', 'm', '3135352752', '31989015810', 'khaledbrugger3@gmail.com', 'brugger5', 'Mateus Leme', '35670-000', 'Minas Gerais', 'Rua Maria das Dores Aguiar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Cor` varchar(15) NOT NULL,
  `Tamanho` varchar(3) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Preco` float NOT NULL,
  `Descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Id`, `Nome`, `Cor`, `Tamanho`, `Quantidade`, `Sexo`, `Preco`, `Descricao`) VALUES
(1, 'calçado loco', 'aa', 's', 12, 'M', 23, 'aszx'),
(2, 'wedbh', 'aad', 's', 12, 'M', 23, 'calçado uouuu'),
(3, 'Tenis Rodinha', 'rosa', '31', 13, 'F', 99, 'calçado com rodinha pras quiança ser feliz rolando por ai'),
(4, 'Sapato Social', 'Preto', '40', 12, 'M', 109, 'Calçado social, para os homi ir bunito nas festa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
