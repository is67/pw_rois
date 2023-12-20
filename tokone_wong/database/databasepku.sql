/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.30 : Database - databasepku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`databasepku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `databasepku`;

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `barangs` */

insert  into `barangs`(`id_barang`,`nama_barang`,`harga`,`stok`) values (1,'pisang',10000.00,12),(2,'bakwan',20000.00,10),(3,'mendoan',30000.00,12),(4,'banana',20000.00,10),(5,'pensil',3000.00,20),(8,'buku',2000.00,22),(9,'fasdasd',1234567.00,100);

/*Table structure for table `logins` */

DROP TABLE IF EXISTS `logins`;

CREATE TABLE `logins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `logins` */

insert  into `logins`(`id`,`username`,`password`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `pelanggans` */

DROP TABLE IF EXISTS `pelanggans`;

CREATE TABLE `pelanggans` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(256) DEFAULT NULL,
  `alamat_pelanggan` varchar(256) DEFAULT NULL,
  `nomor_telepon` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pelanggans` */

insert  into `pelanggans`(`id_pelanggan`,`nama_pelanggan`,`alamat_pelanggan`,`nomor_telepon`) values (1,'bagas','jepara','08912345'),(2,'sagab','thnan','89123455'),(3,'basga','senenan','813211456'),(5,'hagas','taunan','98765457');

/*Table structure for table `pembelians` */

DROP TABLE IF EXISTS `pembelians`;

CREATE TABLE `pembelians` (
  `pembelian_id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int DEFAULT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `quantitas` int DEFAULT NULL,
  `total_harga` int DEFAULT NULL,
  PRIMARY KEY (`pembelian_id`),
  KEY `id_barang` (`id_barang`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `pembelians_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  CONSTRAINT `pembelians_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `barangs` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembelians` */

insert  into `pembelians`(`pembelian_id`,`id_barang`,`id_pelanggan`,`tanggal_pembelian`,`quantitas`,`total_harga`) values (1,1,1,'2023-12-18',12,120000),(2,8,2,'2023-12-18',10,20000),(3,2,1,'2023-12-18',2,40000),(5,3,1,'2023-12-18',4,120000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
