/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.18-MariaDB : Database - newrichtask
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`newrichtask` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '0=main admin, 1 = judge',
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`id`,`name`,`email`,`username`,`password`,`user_type`) values 
(12,'yrux','yrux@gmail.com','yrux','25d55ad283aa400af464c76d713c07ad',2),
(13,'yrux2','yrux2@gmail.com','yrux2','25d55ad283aa400af464c76d713c07ad',1);

/*Table structure for table `login_permissions` */

DROP TABLE IF EXISTS `login_permissions`;

CREATE TABLE `login_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_type_id` (`user_type_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `login_permissions_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `login_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login_permissions` */

insert  into `login_permissions`(`id`,`user_type_id`,`permission_id`,`updated_at`,`created_at`) values 
(1,2,1,'2022-08-02 18:56:41','2022-08-02 18:56:41'),
(2,2,2,'2022-08-02 18:56:43','2022-08-02 18:56:43'),
(3,2,3,'2022-08-02 18:56:45','2022-08-02 18:56:45'),
(4,2,4,'2022-08-02 18:56:47','2022-08-02 18:56:47'),
(5,2,5,'2022-08-02 18:56:49','2022-08-02 18:56:49'),
(6,2,6,'2022-08-02 18:56:51','2022-08-02 18:56:51'),
(7,2,7,'2022-08-02 18:56:53','2022-08-02 18:56:53'),
(8,2,8,'2022-08-02 18:56:55','2022-08-02 18:56:55'),
(9,2,9,'2022-08-02 18:56:57','2022-08-02 18:56:57'),
(10,2,10,'2022-08-02 18:56:59','2022-08-02 18:56:59'),
(11,2,11,'2022-08-02 18:57:02','2022-08-02 18:57:02'),
(12,2,12,'2022-08-02 18:57:04','2022-08-02 18:57:04'),
(13,1,1,'2022-08-02 18:57:14','2022-08-02 18:57:14'),
(14,1,3,'2022-08-02 18:57:19','2022-08-02 18:57:19'),
(15,1,5,'2022-08-02 18:57:27','2022-08-02 18:57:27'),
(16,1,7,'2022-08-02 18:57:29','2022-08-02 18:57:29'),
(17,1,9,'2022-08-02 18:57:32','2022-08-02 18:57:32'),
(18,1,11,'2022-08-02 18:57:35','2022-08-02 18:57:35');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`title`,`name`,`updated_at`,`created_at`) values 
(1,'text-read','text-read','2022-08-02 18:52:29','2022-08-02 18:52:29'),
(2,'text-write','text-write','2022-08-02 18:52:33','2022-08-02 18:52:33'),
(3,'textarea-read','textarea-read','2022-08-02 18:52:44','2022-08-02 18:52:44'),
(4,'textarea-write','textarea-write','2022-08-02 18:52:49','2022-08-02 18:52:49'),
(5,'password-read','password-read','2022-08-02 18:52:56','2022-08-02 18:52:56'),
(6,'password-write','password-write','2022-08-02 18:53:00','2022-08-02 18:53:00'),
(7,'select-read','select-read','2022-08-02 18:53:05','2022-08-02 18:53:05'),
(8,'select-write','select-write','2022-08-02 18:53:09','2022-08-02 18:53:09'),
(9,'radio-read','radio-read','2022-08-02 18:53:31','2022-08-02 18:53:18'),
(10,'radio-write','radio-write','2022-08-02 18:53:29','2022-08-02 18:53:26'),
(11,'checkbox-read','checkbox-read','2022-08-02 18:53:36','2022-08-02 18:53:36'),
(12,'checkbox-write','checkbox-write','2022-08-02 18:53:40','2022-08-02 18:53:40');

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_types` */

insert  into `user_types`(`id`,`type`,`updated_at`,`created_at`) values 
(1,'onlyread','2022-08-02 18:54:27','2022-08-02 18:54:27'),
(2,'allpermissions','2022-08-02 18:54:46','2022-08-02 18:54:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
