-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Versión del servidor: 5.0.21
-- Versión de PHP: 5.1.4
-- 
-- Base de datos: `usuariosLogin`
-- 

-- --------------------------------------------------------
--
--Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol`(
    `idrol` bigint(20) NOT NULL,
    `rodescripcion` varchar(50),
    PRIMARY KEY (`idrol`) 
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `idUsuario` bigInt(20) NOT NULL,
  `usnombre` varchar(50) NOT NULL,
  `uspass` int(11) NOT NULL,
  `usmail` varchar(10) NOT NULL,
  `usdeshabilitado` timestamp NOT NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Estructura de tabla para la tabla `usuariorol`
-- 

CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(50) NOT NULL,
  PRIMARY KEY (`idusuario`, `idrol`),
  FOREIGN KEY (`idusuario`) REFERENCES `usuario`(`idusuario`) ON UPDATE CASCADE,
  FOREIGN KEY (`idrol`) REFERENCES `rol`(`idrol`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 