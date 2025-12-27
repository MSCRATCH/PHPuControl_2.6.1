CREATE TABLE `activity_log` (
`activity_log_id` int(10) NOT NULL AUTO_INCREMENT,
`activity_log_ip_address` varchar(125) NOT NULL,
`activity_log_browser` varchar(125) NOT NULL,
`activity_log_requested_url` varchar(500) NOT NULL,
`activity_log_timestamp` datetime NOT NULL,
`user_id` int(10) DEFAULT NULL,
PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `blocklist` (
`blocklist_id` int(10) NOT NULL AUTO_INCREMENT,
`blocklist_value` varchar(100) NOT NULL,
PRIMARY KEY (`blocklist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `error_log` (
`error_log_id` int(10) NOT NULL AUTO_INCREMENT,
`errno` int(10) NOT NULL,
`errstr` varchar(250) NOT NULL,
`errfile` varchar(250) NOT NULL,
`errline` int(10) NOT NULL,
`err_registered_at` datetime NOT NULL,
PRIMARY KEY (`error_log_id`),
UNIQUE KEY `errno` (`errno`,`errstr`,`errfile`,`errline`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `login_attempts` (
`login_attempts_id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`ip_address` varchar(125) NOT NULL,
`attempts` int(10) NOT NULL DEFAULT 0,
`last_attempt` datetime NOT NULL,
PRIMARY KEY (`login_attempts_id`),
UNIQUE KEY `unique_user_ip` (`username`,`ip_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `settings` (
`setting_id` int(10) NOT NULL AUTO_INCREMENT,
`setting_key` varchar(255) NOT NULL,
`setting_value` varchar(255) NOT NULL,
PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES
('page_title', 'PHPuControl'),
('security_question', 'What is something nobody wants to be, but everyone will be?'),
('security_question_answer', 'old');
('system_message_title', 'PHPuControl system message');
('disable_registration', 'no');

CREATE TABLE `users` (
`user_id` int(10) NOT NULL AUTO_INCREMENT,
`public_id` varchar(32) NOT NULL,
`username` varchar(30) NOT NULL,
`user_password` char(255) NOT NULL,
`user_email` varchar(50) NOT NULL,
`user_level` varchar(50) NOT NULL DEFAULT 'not_activated',
`user_date` datetime NOT NULL,
`last_activity` datetime NOT NULL,
PRIMARY KEY (`user_id`),
UNIQUE KEY `user_email_unique` (`user_email`),
UNIQUE KEY `username_unique` (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `user_profiles` (
`user_profile_id` int(10) NOT NULL AUTO_INCREMENT,
`user_profile_image` varchar(500) NOT NULL,
`user_profile_location` varchar(100) NOT NULL,
`user_profile_description` text NOT NULL,
`user_id` int(10) NOT NULL,
PRIMARY KEY (`user_profile_id`),
KEY `user_id` (`user_id`),
CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
