--
-- Test Module SQL File for Validation Model
--

--
-- Database: `obullo`
--

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS obullo;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(160) NOT NULL,
  `usr_password` varchar(40) NOT NULL,
  `usr_email` varchar(160) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `ob_captcha` (
captcha_id bigint(13) unsigned NOT NULL auto_increment,
captcha_time int(10) unsigned NOT NULL,
ip_address varchar(16) default '0' NOT NULL,
word varchar(20) NOT NULL,
PRIMARY KEY `captcha_id` (`captcha_id`),
KEY `word` (`word`)
);