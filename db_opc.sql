# Host: localhost  (Version: 5.6.17)
# Date: 2016-01-09 23:19:42
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "color"
#

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colorName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "color"
#

INSERT INTO `color` VALUES (1,'red'),(2,'blue'),(3,'yellow'),(4,'green'),(5,'white'),(6,'black'),(7,'grey'),(8,'brown'),(9,'dark green');

#
# Structure for table "designdraft"
#

DROP TABLE IF EXISTS `designdraft`;
CREATE TABLE `designdraft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(200) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

#
# Data for table "designdraft"
#

INSERT INTO `designdraft` VALUES (38,'upload/3dc5f603918fa0ecff22872c259759ee3c6ddbc4.jpg',16),(39,'upload/005NlI29gw1elbp8r3gcaj306a08ddg7.jpg',16),(40,'upload/5f4737c6a7efce1b426161e3ac51f3deb58f65fe.jpg',16),(41,'upload/3dc5f603918fa0ecff22872c259759ee3c6ddbc4.jpg',17),(42,'upload/005NlI29gw1elbp8r3gcaj306a08ddg7.jpg',17),(43,'upload/5f4737c6a7efce1b426161e3ac51f3deb58f65fe.jpg',17),(44,'upload/203fb80e7bec54e77d491c2bbb389b504fc26a59.jpg',18),(45,'upload/693c9b86c9177f3ed690dfc772cf3bc79d3d564c.jpg.png',18),(46,'upload/b0ac63f0f736afc3dc268fd6b219ebc4b64512ba.jpg',18),(47,'upload/005NlI29gw1elbp8r3gcaj306a08ddg7.jpg',19);

#
# Structure for table "material"
#

DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materialName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "material"
#

INSERT INTO `material` VALUES (1,'Wood'),(2,'Plastic'),(3,'Glass'),(4,'Iron');

#
# Structure for table "order"
#

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contacts` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `specificDemand` text,
  `userId` int(11) DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL,
  `materialId` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "order"
#

INSERT INTO `order` VALUES (2,'Zhang yao','BUAA 9# 902','13051580353',3,'',2,2,2,4),(15,'Zhang zz','BUAA dayuncun#9_902','13012313222',4,'23qe3rewtytrujkqeartjkullqewruil!!!额啥地方',2,2,2,1),(17,'123','123','123232',1,'12322',2,1,2,1),(18,'Tom','America','12311113333',1,'good beautiful , bigger than bigger.',2,1,1,3),(19,'2132312','2222','111',1,'good beautiful , bigger than bigger.',2,1,1,3);

#
# Structure for table "type"
#

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "type"
#

INSERT INTO `type` VALUES (1,'Desk chair'),(2,'Dining chair'),(3,'Barstool'),(4,'Leisure chair'),(5,'Lounge');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','123'),(2,'user','123');
