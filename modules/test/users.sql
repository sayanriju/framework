--
-- Test SQL File for Validation Model
--

--
-- Database: `obullo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(160) NOT NULL,
  `usr_password` varchar(40) NOT NULL,
  `usr_email` varchar(160) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;