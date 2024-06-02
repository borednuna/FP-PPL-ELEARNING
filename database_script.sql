CREATE DATABASE elearning;

USE elearning;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `class_description` text NOT NULL,
  `quota` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `class_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`class_id`) REFERENCES `class`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `material_description` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `material_content` text NOT NULL,
  `video_path` varchar(255),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`class_id`) REFERENCES `class`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `material_id` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `grade` int(11),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`material_id`) REFERENCES `material`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11),
  `user_id` int(11),
  `submission_description` text NOT NULL,
  `uploaded_file` text NOT NULL,
  `date_submitted` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`class_id`) REFERENCES `class`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `option_e` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`exam_id`) REFERENCES `exam`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `exam_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_submission_description` text NOT NULL,
  `date_submitted` datetime NOT NULL,
  `exam_id` int(11),
  `user_id` int(11),
  `correct_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`exam_id`) REFERENCES `exam`(`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
);
