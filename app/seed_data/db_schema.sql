SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE `companies` (
`company_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_url` varchar(100) NOT NULL,
  `company_location` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

CREATE TABLE `job_types` (
`job_type_id` int(11) NOT NULL,
  `job_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

CREATE TABLE `majors` (
`major_id` int(11) NOT NULL,
  `major_name` varchar(100) DEFAULT NULL,
  `major_school` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `major_id` int(11) NOT NULL,
  `graduation_year` int(11) NOT NULL,
  `email_address` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

CREATE TABLE `worked_at` (
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `current_company` tinyint(1) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `companies`
 ADD PRIMARY KEY (`company_id`);

ALTER TABLE `job_types`
 ADD PRIMARY KEY (`job_type_id`);

ALTER TABLE `majors`
 ADD PRIMARY KEY (`major_id`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD KEY `user_id` (`user_id`), ADD KEY `major_id` (`major_id`);

ALTER TABLE `worked_at`
 ADD PRIMARY KEY (`user_id`,`company_id`,`job_type_id`), ADD KEY `company_user_at` (`company_id`), ADD KEY `job_type_named` (`job_type_id`);


ALTER TABLE `companies`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
ALTER TABLE `job_types`
MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
ALTER TABLE `majors`
MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;

ALTER TABLE `users`
ADD CONSTRAINT `users_to_majors` FOREIGN KEY (`major_id`) REFERENCES `majors` (`major_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `worked_at`
ADD CONSTRAINT `user_at_company` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `company_user_at` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `job_type_named` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`job_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
