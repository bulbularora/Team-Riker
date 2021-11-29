CREATE TABLE `User` (
 `user_id` int NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `email` varchar(30) NOT NULL,
 `password` varchar(10) NOT NULL,
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `Events` (
 `user_id` int DEFAULT NULL,
 `event_id` int NOT NULL AUTO_INCREMENT,
 `title` varchar(30) NOT NULL,
 `course_name` varchar(30) NOT NULL,
 `type` varchar(30) NOT NULL,
 `due_date` date DEFAULT NULL,
 `due_time` time DEFAULT NULL,
 `description` varchar(500) DEFAULT NULL,
 `state` varchar(50) DEFAULT NULL,
 PRIMARY KEY (`event_id`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4

