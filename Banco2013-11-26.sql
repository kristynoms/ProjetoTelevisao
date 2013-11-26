/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.32 : Database - projetotr
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projetotr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `projetotr`;

/*Table structure for table `classificacaoetaria` */

DROP TABLE IF EXISTS `classificacaoetaria`;

CREATE TABLE `classificacaoetaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `classificacaoetaria` */

insert  into `classificacaoetaria`(`id`,`nome`) values (1,'13+'),(2,'16+'),(3,'18+');

/*Table structure for table `emissora` */

DROP TABLE IF EXISTS `emissora`;

CREATE TABLE `emissora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `emissora` */

insert  into `emissora`(`id`,`nome`) values (1,'Globo'),(2,'SBT'),(3,'BAND');

/*Table structure for table `genero` */

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `genero` */

insert  into `genero`(`id`,`nome`) values (1,'Suspense'),(2,'Drama'),(3,'Com�dia');

/*Table structure for table `grade` */

DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_programa` int(11) DEFAULT NULL,
  `dataExibicao` date DEFAULT NULL,
  `horaExibicao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `grade` */

insert  into `grade`(`id`,`fk_programa`,`dataExibicao`,`horaExibicao`) values (1,2,'2013-09-30','00:00'),(14,6,'2013-09-30','01:00'),(15,7,'2013-09-30','09:00');

/*Table structure for table `programa` */

DROP TABLE IF EXISTS `programa`;

CREATE TABLE `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `fk_genero_id` int(11) DEFAULT NULL,
  `sinopse` varchar(200) DEFAULT NULL,
  `fk_classificacao_id` int(11) DEFAULT NULL,
  `fk_emissora_id` int(11) DEFAULT NULL,
  `fk_tipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `programa` */

insert  into `programa`(`id`,`nome`,`fk_genero_id`,`sinopse`,`fk_classificacao_id`,`fk_emissora_id`,`fk_tipo_id`) values (2,'Todo Mundo em Panico 2',3,'Filme de comédia',2,1,1),(6,'Friends',3,'Comedy tv series',1,1,2),(7,'How I meet your Mother',3,'Comedy tv series',1,1,2);

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipo` */

insert  into `tipo`(`id`,`nome`) values (1,'Novela'),(2,'S�rie'),(3,'Informativo'),(4,'Filme');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into usuario(nome,email,login,senha) values('eee','eee','eee','eee');

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
