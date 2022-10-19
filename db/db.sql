SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
create database IF NOT EXISTS vcs;
use vcs;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS challenge;

CREATE TABLE users(
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(255),
    `password` varchar(255),
    `name` varchar(255),
    `email` varchar(255),
    `phone` varchar(255),
    `role` varchar(255),
    PRIMARY KEY (id)
);
CREATE TABLE student(
    `idexercise` varchar(255),
    `username` varchar(255),
    `ext` varchar(255)
);
CREATE TABLE messages(
    `fromuser` varchar(255),
    `touser` varchar(255),
    `message` varchar(255)
);
CREATE TABLE challenge(
    `hint` varchar(255)
);

INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('teacher123','teacher123', 'Mr Nguyen Van Teacher','teacher@class.com','1234567890','teacher');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student1','student1', 'Mr Nguyen Van Student1','student1@class.com','0987654321','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student2','student2', 'Mr Nguyen Van Student2','student2@class.com','0987654322','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student3','student3', 'Mr Nguyen Van Student3','student3@class.com','0987654323','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student4','student4', 'Mr Nguyen Van Student4','student4@class.com','0987654324','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student5','student5', 'Mr Nguyen Van Student5','student5@class.com','0987654325','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student6','student6', 'Mr Nguyen Van Student6','student6@class.com','0987654326','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student7','student7', 'Mr Nguyen Van Student7','student7@class.com','0987654327','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student8','student8', 'Mr Nguyen Van Student8','student8@class.com','0987654328','student');
INSERT INTO `users` (`username`,`password`,`name`,`email`,`phone`,`role`) VALUES ('student9','student9', 'Mr Nguyen Van Student9','student9@class.com','0987654329','student');
