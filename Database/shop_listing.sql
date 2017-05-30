/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.25 : Database - shop_listing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop_listing` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop_listing`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `type` char(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

/*Table structure for table `medias` */

DROP TABLE IF EXISTS `medias`;

CREATE TABLE `medias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `medias` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(15) NOT NULL,
  `role` char(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`phone`,`role`,`is_deleted`,`created`,`modified`) values (11,'test','$2y$10$hIsxXe4ak/EfgOebGe0KRO4jydkR9Ug1x7LUzVzRMBRSU0YOl77Dy','example@gmail.com','010804999','user',0,'2017-05-24 03:30:27','2017-05-24 03:30:27'),(32,'meyreyya','$2y$10$1Yiyc4f1BEAqKjjo.ogg3uQUEUjZy1UxbTcqzUc21qcslEO9sEaZi','kan.meyreyya@gmail.com','010804999','admin',0,'2017-05-26 06:53:25','2017-05-30 09:48:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
