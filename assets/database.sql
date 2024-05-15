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

-- Dumping structure for table sis.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sis.account: ~10 rows (approximately)
REPLACE INTO `account` (`id`, `userName`, `password`) VALUES
	(180, 'Omar', 'Kh9513572680$'),
	(181, 'Yasser', 'Kh9513572680$'),
	(182, 'Tamer', 'Kh9513572680$'),
	(183, 'Ezz', 'Kh9513572680$'),
	(184, 'Fateh', 'Kh9513572680$'),
	(185, 'Fatah_951', 'Kh9513572680$'),
	(186, 'mark_killer', 'Kh9513572680$'),
	(187, 'Tali_', 'kH9513572680$'),
	(188, 'stone', 'Kh9513572680$'),
	(189, 'Spendlove', 'Kh9513572680$'),
	(190, 'David', 'Kh9513572680$'),
	(191, 'Kate.', 'Kh9513572680$'),
	(192, 'Mary_1998', 'Kh9513572680$');

-- Dumping structure for table sis.course
CREATE TABLE IF NOT EXISTS `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` int NOT NULL,
  `hours` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table sis.course: ~23 rows (approximately)
REPLACE INTO `course` (`id`, `name`, `level`, `hours`) VALUES
	(26, 'Electronics', 1, 3),
	(27, 'Math-1', 1, 3),
	(28, 'Math-0', 1, 3),
	(29, 'Human Rights', 1, 2),
	(30, 'Technical Report', 1, 2),
	(31, 'Discrete Math', 1, 3),
	(32, 'Programming 1', 1, 3),
	(33, 'Logic Design', 1, 3),
	(34, 'Math-2', 1, 3),
	(35, 'Probability and Statistics 1', 1, 3),
	(36, 'Microeconomics', 1, 2),
	(37, 'Introduction to Networking', 2, 3),
	(38, 'Introduction to Database', 2, 3),
	(39, 'Introduction to Software Engineering', 2, 3),
	(40, 'Programming 2', 2, 3),
	(41, 'Math-3', 2, 3),
	(42, 'Probability and Statistics 2', 2, 3),
	(43, 'Data Structures', 2, 3),
	(44, 'Web', 2, 3),
	(45, 'Machine Learning', 2, 3),
	(46, 'Introduction to Operation Research', 2, 3),
	(47, 'Network Labs', 2, 2),
	(48, 'Entrepreneurship', 2, 2);

-- Dumping structure for table sis.enrollment
CREATE TABLE IF NOT EXISTS `enrollment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `courseLevel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courseHours` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `studentUserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teacherUserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courseName` (`courseName`),
  KEY `studentUserName` (`studentUserName`),
  KEY `TeacherUserName` (`teacherUserName`),
  CONSTRAINT `course_name` FOREIGN KEY (`courseName`) REFERENCES `course` (`name`),
  CONSTRAINT `student_user_name` FOREIGN KEY (`studentUserName`) REFERENCES `student` (`userName`),
  CONSTRAINT `teacher_user_name` FOREIGN KEY (`teacherUserName`) REFERENCES `teacher` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=2129 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table sis.enrollment: ~171 rows (approximately)
REPLACE INTO `enrollment` (`id`, `courseName`, `courseLevel`, `courseHours`, `studentUserName`, `teacherUserName`) VALUES
	(2041, 'Electronics', '1', '3', 'Omar', 'Yasser'),
	(2042, 'Math-1', '1', '3', 'Omar', 'Yasser'),
	(2043, 'Math-0', '1', '3', 'Omar', 'Yasser'),
	(2044, 'Human Rights', '1', '2', 'Omar', 'Yasser'),
	(2045, 'Technical Report', '1', '2', 'Omar', 'Yasser'),
	(2046, 'Discrete Math', '1', '3', 'Omar', 'Yasser'),
	(2047, 'Programming 1', '1', '3', 'Omar', 'Yasser'),
	(2048, 'Logic Design', '1', '3', 'Omar', 'Yasser'),
	(2049, 'Math-2', '1', '3', 'Omar', 'Yasser'),
	(2050, 'Probability and Statistics 1', '1', '3', 'Omar', 'Yasser'),
	(2051, 'Microeconomics', '1', '2', 'Omar', 'Yasser'),
	(2052, 'Introduction to Database', '2', '3', 'Tamer', 'Yasser'),
	(2053, 'Introduction to Software Engineering', '2', '3', 'Tamer', 'Yasser'),
	(2054, 'Programming 2', '2', '3', 'Tamer', 'Yasser'),
	(2055, 'Math-3', '2', '3', 'Tamer', 'Yasser'),
	(2056, 'Probability and Statistics 2', '2', '3', 'Tamer', 'Yasser'),
	(2057, 'Data Structures', '2', '3', 'Tamer', 'Yasser'),
	(2058, 'Web', '2', '3', 'Tamer', 'Yasser'),
	(2059, 'Machine Learning', '2', '3', 'Tamer', 'Yasser'),
	(2060, 'Introduction to Operation Research', '2', '3', 'Tamer', 'Yasser'),
	(2061, 'Network Labs', '2', '2', 'Tamer', 'Yasser'),
	(2062, 'Introduction to Database', '2', '3', 'Fateh', 'Yasser'),
	(2063, 'Introduction to Software Engineering', '2', '3', 'Fateh', 'Yasser'),
	(2064, 'Programming 2', '2', '3', 'Fateh', 'Yasser'),
	(2065, 'Math-3', '2', '3', 'Fateh', 'Yasser'),
	(2066, 'Probability and Statistics 2', '2', '3', 'Fateh', 'Yasser'),
	(2067, 'Data Structures', '2', '3', 'Fateh', 'Yasser'),
	(2068, 'Web', '2', '3', 'Fateh', 'Yasser'),
	(2069, 'Machine Learning', '2', '3', 'Fateh', 'Yasser'),
	(2070, 'Introduction to Operation Research', '2', '3', 'Fateh', 'Yasser'),
	(2071, 'Network Labs', '2', '2', 'Fateh', 'Yasser'),
	(2072, 'Introduction to Database', '2', '3', 'Fatah_951', 'Yasser'),
	(2073, 'Introduction to Software Engineering', '2', '3', 'Fatah_951', 'Yasser'),
	(2074, 'Programming 2', '2', '3', 'Fatah_951', 'Yasser'),
	(2075, 'Math-3', '2', '3', 'Fatah_951', 'Yasser'),
	(2076, 'Probability and Statistics 2', '2', '3', 'Fatah_951', 'Yasser'),
	(2077, 'Data Structures', '2', '3', 'Fatah_951', 'Yasser'),
	(2078, 'Web', '2', '3', 'Fatah_951', 'Yasser'),
	(2079, 'Machine Learning', '2', '3', 'Fatah_951', 'Yasser'),
	(2080, 'Introduction to Operation Research', '2', '3', 'Fatah_951', 'Yasser'),
	(2081, 'Network Labs', '2', '2', 'Fatah_951', 'Yasser'),
	(2082, 'Electronics', '1', '3', 'mark_killer', 'Yasser'),
	(2083, 'Electronics', '1', '3', 'mark_killer', 'Ezz'),
	(2084, 'Math-1', '1', '3', 'mark_killer', 'Yasser'),
	(2085, 'Math-1', '1', '3', 'mark_killer', 'Ezz'),
	(2086, 'Math-0', '1', '3', 'mark_killer', 'Yasser'),
	(2087, 'Math-0', '1', '3', 'mark_killer', 'Ezz'),
	(2088, 'Human Rights', '1', '2', 'mark_killer', 'Yasser'),
	(2089, 'Human Rights', '1', '2', 'mark_killer', 'Ezz'),
	(2090, 'Technical Report', '1', '2', 'mark_killer', 'Yasser'),
	(2091, 'Discrete Math', '1', '3', 'mark_killer', 'Yasser'),
	(2092, 'Programming 1', '1', '3', 'mark_killer', 'Yasser'),
	(2093, 'Introduction to Database', '2', '3', 'Tali_', 'Yasser'),
	(2094, 'Introduction to Software Engineering', '2', '3', 'Tali_', 'Yasser'),
	(2095, 'Programming 2', '2', '3', 'Tali_', 'Yasser'),
	(2096, 'Math-3', '2', '3', 'Tali_', 'Yasser'),
	(2097, 'Probability and Statistics 2', '2', '3', 'Tali_', 'Yasser'),
	(2098, 'Data Structures', '2', '3', 'Tali_', 'Yasser'),
	(2099, 'Web', '2', '3', 'Tali_', 'Yasser'),
	(2100, 'Machine Learning', '2', '3', 'Tali_', 'Yasser'),
	(2101, 'Introduction to Operation Research', '2', '3', 'Tali_', 'Yasser'),
	(2102, 'Network Labs', '2', '2', 'Tali_', 'Yasser'),
	(2103, 'Introduction to Database', '2', '3', 'stone', 'Yasser'),
	(2104, 'Introduction to Software Engineering', '2', '3', 'stone', 'Yasser'),
	(2105, 'Programming 2', '2', '3', 'stone', 'Yasser'),
	(2106, 'Math-3', '2', '3', 'stone', 'Yasser'),
	(2107, 'Probability and Statistics 2', '2', '3', 'stone', 'Yasser'),
	(2108, 'Data Structures', '2', '3', 'stone', 'Yasser'),
	(2109, 'Web', '2', '3', 'stone', 'Yasser'),
	(2110, 'Machine Learning', '2', '3', 'stone', 'Yasser'),
	(2111, 'Introduction to Operation Research', '2', '3', 'stone', 'Yasser'),
	(2112, 'Network Labs', '2', '2', 'stone', 'Yasser'),
	(2113, 'Electronics', '1', '3', 'Kate.', 'Yasser'),
	(2114, 'Electronics', '1', '3', 'Kate.', 'Ezz'),
	(2115, 'Math-1', '1', '3', 'Kate.', 'Yasser'),
	(2116, 'Math-1', '1', '3', 'Kate.', 'Ezz'),
	(2117, 'Math-0', '1', '3', 'Kate.', 'Yasser'),
	(2118, 'Math-0', '1', '3', 'Kate.', 'Ezz'),
	(2119, 'Human Rights', '1', '2', 'Kate.', 'Yasser'),
	(2120, 'Human Rights', '1', '2', 'Kate.', 'Ezz'),
	(2121, 'Technical Report', '1', '2', 'Kate.', 'Yasser'),
	(2122, 'Discrete Math', '1', '3', 'Kate.', 'Yasser'),
	(2123, 'Programming 1', '1', '3', 'Kate.', 'Yasser'),
	(2124, 'Introduction to Database', '2', '3', 'Tamer', 'Mary_1998'),
	(2125, 'Introduction to Database', '2', '3', 'Fateh', 'Mary_1998'),
	(2126, 'Introduction to Database', '2', '3', 'Fatah_951', 'Mary_1998'),
	(2127, 'Introduction to Database', '2', '3', 'Tali_', 'Mary_1998'),
	(2128, 'Introduction to Database', '2', '3', 'stone', 'Mary_1998');

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

-- Dumping data for table sis.student: ~10 rows (approximately)
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

-- Dumping structure for table sis.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `accountId` int NOT NULL DEFAULT '-1',
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_account_id_fk` (`accountId`),
  KEY `teacher_account_name_fk` (`userName`),
  CONSTRAINT `teacher_account_id_fk` FOREIGN KEY (`accountId`) REFERENCES `account` (`id`),
  CONSTRAINT `teacher_account_name_fk` FOREIGN KEY (`userName`) REFERENCES `account` (`userName`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table sis.teacher: ~0 rows (approximately)
REPLACE INTO `teacher` (`id`, `accountId`, `userName`, `name`, `address`) VALUES
	(190, 181, 'Yasser', 'Yasser', 'Ain Shams Cairo'),
	(191, 183, 'Ezz', 'Ezz', 'Ismailia'),
	(192, 192, 'Mary_1998', 'Mary Burgess', '6 7 Milland Road Neath');

-- Dumping structure for table sis.teaches
CREATE TABLE IF NOT EXISTS `teaches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacherUserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherUserName` (`teacherUserName`),
  KEY `course` (`course`),
  CONSTRAINT `teached_course_name_fk` FOREIGN KEY (`course`) REFERENCES `course` (`name`),
  CONSTRAINT `teacher_user_name_fk` FOREIGN KEY (`teacherUserName`) REFERENCES `teacher` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table sis.teaches: ~119 rows (approximately)
REPLACE INTO `teaches` (`id`, `teacherUserName`, `course`) VALUES
	(503, 'Yasser', 'Electronics'),
	(504, 'Yasser', 'Math-1'),
	(505, 'Yasser', 'Math-0'),
	(506, 'Yasser', 'Human Rights'),
	(507, 'Yasser', 'Technical Report'),
	(508, 'Yasser', 'Discrete Math'),
	(509, 'Yasser', 'Programming 1'),
	(510, 'Yasser', 'Logic Design'),
	(511, 'Yasser', 'Math-2'),
	(512, 'Yasser', 'Probability and Statistics 1'),
	(513, 'Yasser', 'Microeconomics'),
	(515, 'Yasser', 'Introduction to Database'),
	(516, 'Yasser', 'Introduction to Software Engineering'),
	(517, 'Yasser', 'Programming 2'),
	(518, 'Yasser', 'Math-3'),
	(519, 'Yasser', 'Probability and Statistics 2'),
	(520, 'Yasser', 'Data Structures'),
	(521, 'Yasser', 'Web'),
	(522, 'Yasser', 'Machine Learning'),
	(523, 'Yasser', 'Introduction to Operation Research'),
	(524, 'Yasser', 'Network Labs'),
	(526, 'Ezz', 'Electronics'),
	(527, 'Ezz', 'Math-1'),
	(528, 'Ezz', 'Math-0'),
	(529, 'Ezz', 'Human Rights'),
	(530, 'Ezz', 'Programming 1'),
	(531, 'Ezz', 'Logic Design'),
	(532, 'Ezz', 'Math-2'),
	(533, 'Mary_1998', 'Electronics'),
	(534, 'Mary_1998', 'Math-1'),
	(535, 'Mary_1998', 'Math-0'),
	(536, 'Mary_1998', 'Human Rights'),
	(537, 'Mary_1998', 'Programming 1'),
	(538, 'Mary_1998', 'Logic Design'),
	(539, 'Mary_1998', 'Microeconomics'),
	(541, 'Mary_1998', 'Introduction to Database');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
