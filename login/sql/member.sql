CREATE TABLE `member`(
    `id` tinyint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` char(4) NOT NULL,
    `member_id` varchar(20) NOT NULL,
    `member_pw` varchar(20) NOT NULL,
    `gender` enum('남자', '여자') NOT NULL,
    `address` varchar(50) NOT NULL,
    `birthday` datetime NOT NULL
);