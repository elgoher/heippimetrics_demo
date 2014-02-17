/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.5.28 : Database - heippianalyticsdemo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `heippianalyticsdemo`;

USE `heippianalyticsdemo`;

/*Table structure for table `camera` */

DROP TABLE IF EXISTS `camera`;

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `resolution` int(11) DEFAULT NULL,
  `quality_image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `camera` */

/*Table structure for table `consumer_data` */

DROP TABLE IF EXISTS `consumer_data`;

CREATE TABLE `consumer_data` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `detection_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lost_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_consumer_data_user` (`player_id`),
  CONSTRAINT `FK_consumer_data_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consumer_data` */

/*Table structure for table `image_cam` */

DROP TABLE IF EXISTS `image_cam`;

CREATE TABLE `image_cam` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `path_image` varchar(300) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `processed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_image_php_user` (`player_id`),
  CONSTRAINT `FK_image_cam_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `image_cam` */

/*Table structure for table `image_processed` */

DROP TABLE IF EXISTS `image_processed`;

CREATE TABLE `image_processed` (
  `id` int(11) NOT NULL,
  `image_cam_id` int(11) NOT NULL,
  `path_image` varchar(100) DEFAULT NULL,
  `detections_number` int(11) DEFAULT NULL,
  `view` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_image_processed_image_php` (`image_cam_id`),
  CONSTRAINT `FK_image_processed_image_cam` FOREIGN KEY (`image_cam_id`) REFERENCES `image_cam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `image_processed` */

/*Table structure for table `pc` */

DROP TABLE IF EXISTS `pc`;

CREATE TABLE `pc` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `processor_core` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pc` */

/*Table structure for table `player` */

DROP TABLE IF EXISTS `player`;

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `id_location` int(11) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `id_cam` int(11) DEFAULT NULL,
  `id_pc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_player_camera` (`id_cam`),
  KEY `FK_player_pc` (`id_pc`),
  KEY `FK_player_user` (`user_id`),
  CONSTRAINT `FK_player_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_player_camera` FOREIGN KEY (`id_cam`) REFERENCES `camera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_player_pc` FOREIGN KEY (`id_pc`) REFERENCES `pc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `player` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name_user` varchar(100) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`name_user`,`password`) values (1,'user@heippi.com','user','asdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
