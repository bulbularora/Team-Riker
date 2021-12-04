CREATE TABLE `Type` (
 `type_id` int NOT NULL,
 `name` varchar(15) NOT NULL,
 `types` varchar(15) NOT NULL,
 PRIMARY KEY (`type_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

INSERT INTO `Type` (`type_id`, `name`, `types`) VALUES ('1', 'Assignment', 'assignment'), ('2', 'Lab', 'lab'), ('3', 'Exam', 'exam') 
