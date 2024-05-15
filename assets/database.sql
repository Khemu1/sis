-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table sis.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `accountId` int NOT NULL DEFAULT '-1',
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_account_id` (`accountId`),
  KEY `student_account_userName` (`userName`),
  CONSTRAINT `student_account_id` FOREIGN KEY (`accountId`) REFERENCES `account` (`id`),
  CONSTRAINT `student_account_userName` FOREIGN KEY (`userName`) REFERENCES `account` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table sis.student: ~15 rows (approximately)
REPLACE INTO `student` (`id`, `accountId`, `userName`, `name`, `address`, `level`) VALUES
	(57, 180, 'Omar', 'Omar', 'Shatby Alexandria', 1),
	(58, 182, 'Tamer', 'Tamer', '25st tahrir Assiut', 2),
	(59, 184, 'Fateh', 'Fateh', 'Cairo', 2),
	(60, 185, 'Fatah_951', 'Fatah', '6th st Germany', 2),
	(61, 186, 'mark_killer', 'Tomas Boyes', '59 Maidenstone Hill London', 1),
	(62, 187, 'Tali_', 'tali', '14 Beacon Rd Herne Bay Kent', 2),
	(63, 188, 'stone', 'scott', '33 High St Bristol Avon', 2),
	(64, 189, 'Spendlove', 'John dickens', '14-15 Minto St Midlothian', 2),
	(65, 190, 'David', 'David Arthur', '18 Wellington St Aberdeen City', 2),
	(66, 191, 'Kate.', 'Kate Brock', 'Demesne Farm North Yorkshire', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
