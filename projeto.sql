-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2020 às 03:32
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `produtor` varchar(100) NOT NULL,
  `gravadora` varchar(100) NOT NULL,
  `classificacao` int(10) NOT NULL,
  `diretor` varchar(100) NOT NULL,
  `diretor_musical` varchar(100) NOT NULL,
  `roteirista` varchar(100) NOT NULL,
  `cinegrafista` varchar(100) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `lancamento` varchar(20) NOT NULL,
  `tempo` varchar(100) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `genero`, `produtor`, `gravadora`, `classificacao`, `diretor`, `diretor_musical`, `roteirista`, `cinegrafista`, `origem`, `lancamento`, `tempo`, `criado`, `editado`) VALUES
(1, 'Gente Grande', 'comédia', 'adam sandler', 'JWRT', 14, 'John Rewis', 'Louis Champton', 'Carol Mariws', 'Mariah Cariw', 'Hollyhood', '2014', '1h40m', '2020-05-21 13:25:24', '2020-05-21 13:25:24'),
(2, 'Milagre na cela 7', 'Drama', 'Chris Lewis', 'LC Movies', 12, 'Christofen Rown', 'Harry Hood', 'Selena Caprill', 'Jowken leeh', 'Russia', '2020', '2h', '2020-05-21 13:27:38', '2020-05-21 13:27:38'),
(3, 'branquelas', 'comedia', 'grew', 'LBG', 14, 'Adam sleep', 'josh whaisj', 'luise auhdusdh', 'gray asuhduah', 'EUA', '', '', '2020-05-28 01:11:42', '2020-05-28 01:11:42'),
(4, 'branquelas', 'comedia', 'grew', 'LBG', 14, 'Adam sleep', 'josh whaisj', 'luise auhdusdh', 'gray asuhduah', 'EUA', '', '', '2020-05-28 01:11:42', '2020-05-28 01:11:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `lancamento` varchar(20) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `distrubuidora` varchar(100) NOT NULL,
  `linguagem` varchar(100) NOT NULL,
  `traducao` varchar(100) NOT NULL,
  `tradutor` varchar(100) NOT NULL,
  `titulo_origem` varchar(100) NOT NULL,
  `designer_conteudo` varchar(100) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `editora`, `lancamento`, `genero`, `origem`, `distrubuidora`, `linguagem`, `traducao`, `tradutor`, `titulo_origem`, `designer_conteudo`, `criado`, `editado`) VALUES
(1, 'Filoteia', 'Francisco de Sales', 'MBC', '1567', 'romance', 'Italia', 'MBC dois irmaos', 'Italiano', 'portugues', 'Eduardo Oliveira', 'introducion a la vie devota', 'Matheus Bazzo', '2020-05-21 13:18:12', '2020-05-21 13:18:12'),
(2, 'Perguntas e respostas seguido de escola sem deus', 'Louis Gaston ', 'MBC', '1851', 'doutrina', 'italia', 'MBC dois irmaos', 'italiano', 'portugues', 'José Lima', 'escola sem dios', 'Matheus Bazzo', '2020-05-21 13:21:19', '2020-05-21 13:21:19'),
(3, 'bento ', 'gregory', 'MBC', '2019', 'drama', 'italia', 'MBC', 'italiano', 'portugues', 'joao luis', 'bents', '', '2020-05-28 01:07:48', '2020-05-28 01:07:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(300) DEFAULT NULL,
  `aniversario` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `aniversario`, `cpf`, `genero`, `estado`, `cidade`, `criado`, `alterado`) VALUES
(1, 'Eduarda Dalmas', 'eduardadalmas@ienh.com.br', '123', '14/05', '04198579075', 'feminino', 'RS', 'Novo Hamburgo', '2020-05-20 22:42:34', '2020-05-20 22:42:34'),
(2, 'Martim Fuhr', 'martimfuhr@hotmail.com', '123', '11/03', '98534765', 'masculino', 'RS', 'Sapiranga', '2020-05-20 22:46:24', '2020-05-20 22:46:24'),
(3, 'andre dalmas', 'de.dalmas71@gmail.com', '123123', '02/06/1971', '633.724.790-68', 'masculino', 'RS', 'novo hamburgo', '2020-05-28 00:20:45', '2020-05-28 00:20:45'),
(4, 'Vania Rita', 'rita@gmail.com', '123123', '13/05/1972', '98674367', 'feminino', 'RS', 'novo hamburgo', '2020-05-28 00:31:01', '2020-05-28 00:31:01'),
(6, 'Nivia Fuhr', 'nivia@gmail.com', '123', '13/05/1972', '98674367', 'feminino', 'RS', 'novo hamburgo', '2020-05-28 00:34:35', '2020-05-28 00:34:35'),
(7, 'Luis Silva', 'Silva@gmail.com', '1234', '13/05/1972', '98674367', 'masculino', 'RS', 'novo hamburgo', '2020-05-28 00:35:21', '2020-05-28 00:35:21'),
(8, 'Luis Silva', 'Silva@gmail.com', '123123', '13/05/1972', '98674367', 'masculino', 'RS', 'novo hamburgo', '2020-05-28 00:36:14', '2020-05-28 00:36:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
