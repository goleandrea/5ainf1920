SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `DBpersone` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `DBpersone`;



CREATE TABLE `persone` (
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `persone` (`nome`, `cognome`) VALUES ('Nicola', 'Magnaldi'),
                                          VALUES ('Rossi','Mario');