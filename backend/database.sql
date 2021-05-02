-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Maio-2021 às 17:44
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Banco de dados: `cade_minha_casa`
--
CREATE DATABASE cade_minha_casa;
-- --------------------------------------------------------
--
-- Estrutura da tabela `abaixo_assin`
--
CREATE TABLE `abaixo_assin` (
  `ID_ABAIXO_ASSIN` int(11) NOT NULL,
  `ID_IMOVEL` int(11) NOT NULL,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` char(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
-- --------------------------------------------------------
--
-- Estrutura da tabela `imov_aban_sin`
--
CREATE TABLE `imov_aban_sin` (
  `ID_IMOVEL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `LOGRADOURO` varchar(60) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMPLEMENTO` varchar(80) DEFAULT NULL,
  `BAIRRO` varchar(30) NOT NULL,
  `CEP` char(9) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Estrutura da tabela `imov_aban_ver`
--
CREATE TABLE `imov_aban_ver` (
  `ID_IMOVEL` int(11) NOT NULL,
  `IMAGEM` tinytext DEFAULT NULL,
  `LOGRADOURO` varchar(60) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMPLEMENTO` varchar(80) DEFAULT NULL,
  `BAIRRO` varchar(30) NOT NULL,
  `CEP` char(9) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Extraindo dados da tabela `imov_aban_ver`
--
INSERT INTO `imov_aban_ver` (
    `ID_IMOVEL`,
    `IMAGEM`,
    `LOGRADOURO`,
    `NUMERO`,
    `COMPLEMENTO`,
    `BAIRRO`,
    `CEP`
  )
VALUES (
    1,
    'gen_couto_de_magalhaes.png',
    'R. Gen. Couto de Magalhães',
    388,
    NULL,
    'Santa Ifigênia',
    '01212-030'
  ),
  (
    2,
    'r_do_carmo.png',
    'R. do Carmo',
    93,
    NULL,
    'Sé',
    '01019-020'
  ),
  (
    3,
    'r_brg_tobias.png',
    'R. Brg. Tobias',
    700,
    NULL,
    'Centro',
    '01019-020'
  ),
  (
    4,
    'r_dos_franceses.png',
    'R. Ulisses Paranhos',
    230,
    NULL,
    'Bela Vista',
    '01330-020'
  ),
  (
    5,
    'r_dr_rodrigo_silva.png',
    'R. Dr. Rodrigo Silva',
    36,
    NULL,
    'Sé',
    '01501-010'
  ),
  (
    6,
    'r_quintino_bocaiuva.png',
    'R. Quintino Bocaiúva',
    307,
    NULL,
    'Sé',
    '06706-110'
  );
CREATE TABLE `sit_imov_sin` (
  `ID_SIT` int(11) NOT NULL,
  `ID_IMOVEL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `SEG_PUBLICA` tinyint(4) DEFAULT NULL,
  `ILUMINACAO` tinyint(4) DEFAULT NULL,
  `SIT_CALCADA` tinyint(4) DEFAULT NULL,
  `COND_EXTRAS` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME_COMPLETO` varchar(80) NOT NULL,
  `EMAIL` varchar(80) NOT NULL,
  `SENHA` char(32) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
ALTER TABLE `imov_aban_sin`
ADD PRIMARY KEY (`ID_IMOVEL`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);
ALTER TABLE `imov_aban_ver`
ADD PRIMARY KEY (`ID_IMOVEL`);
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`ID_USUARIO`);
ALTER TABLE `imov_aban_sin`
MODIFY `ID_IMOVEL` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
ALTER TABLE `imov_aban_ver`
MODIFY `ID_IMOVEL` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
ALTER TABLE `usuarios`
MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
ALTER TABLE `imov_aban_sin`
ADD CONSTRAINT `IMOV_ABAN_SIN_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`);
COMMIT;