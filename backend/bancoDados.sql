CREATE DATABASE CADE_MINHA_CASA;

/*
Siga a ordem para criar as tabelas
*/

CREATE TABLE `USUARIOS` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME_COMPLETO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `IMOV_ABAN_VER` (
  `ID_IMOVEL` int(11) NOT NULL,
  `IMAGEM` tinytext COLLATE utf8_unicode_ci,
  `LOGRADOURO` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMPLEMENTO` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAIRRO` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` char(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `IMOV_ABAN_SIN` (
  `ID_IMOVEL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `LOGRADOURO` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMPLEMENTO` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAIRRO` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` char(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `ABAIXO_ASSIN` (
  `ID_ABAIXO_ASSIN` int(11) NOT NULL,
  `ID_IMOVEL` int(11) NOT NULL,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` char(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `SIT_IMOV_SIN` (
  `ID_SIT` int(11) NOT NULL,
  `ID_IMOVEL` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `SEG_PUBLICA` tinyint(4) DEFAULT NULL,
  `ILUMINACAO` tinyint(4) DEFAULT NULL,
  `SIT_CALCADA` tinyint(4) DEFAULT NULL,
  `COND_EXTRAS` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*
Viva la vida
*/