DROP TABLE `booking`;

CREATE TABLE `booking` (
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `no_participants` int(11) NOT NULL DEFAULT 1 CHECK(`no_participants` >= 1),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;
