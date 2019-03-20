-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bd_prn
CREATE DATABASE IF NOT EXISTS `bd_prn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_prn`;

-- Copiando estrutura para tabela bd_prn.tb_newsletter
CREATE TABLE IF NOT EXISTS `tb_newsletter` (
  `ID_NEWS` int(11) NOT NULL AUTO_INCREMENT,
  `DATA_CRIACAO` date NOT NULL,
  `TITULO` varchar(50) NOT NULL,
  `ATIVA` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_NEWS`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_prn.tb_noticias
CREATE TABLE IF NOT EXISTS `tb_noticias` (
  `ID_NOTICIAS` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(144) DEFAULT NULL,
  `DESCRICAO` text,
  `CATEGORIA` varchar(50) DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_NOTICIAS`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_prn.tb_noticias_news
CREATE TABLE IF NOT EXISTS `tb_noticias_news` (
  `ID_NOTICIA_NEWS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NEWS` int(11) NOT NULL,
  `ID_NOTICIA` int(11) NOT NULL,
  `EXCLUIDA` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_NOTICIA_NEWS`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
