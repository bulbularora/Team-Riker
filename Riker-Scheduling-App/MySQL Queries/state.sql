CREATE TABLE `state` (
 `state_id` int NOT NULL,
 `name` varchar(15) NOT NULL,
 `states` varchar(15) NOT NULL,
 PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

INSERT INTO `State` (`state_id`, `name`, `states`) VALUES ('1', 'To-Do', 'todo'), ('2', 'In Progress', 'inprogress'), ('3', 'Done', 'done') 
