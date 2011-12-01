--
-- Test SQL File for Captcha Module
--

--
-- Database: `obullo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ob_captcha`
--

CREATE TABLE ob_captcha (
captcha_id bigint(13) unsigned NOT NULL auto_increment,
captcha_time int(10) unsigned NOT NULL,
ip_address varchar(16) default '0' NOT NULL,
word varchar(20) NOT NULL,
PRIMARY KEY `captcha_id` (`captcha_id`),
KEY `word` (`word`)
)