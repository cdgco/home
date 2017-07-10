--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `newsource` varchar(255) NOT NULL DEFAULT 'http://rss.cnn.com/rss/cnn_topstories.rss',
  `sourcename` varchar(255) NOT NULL DEFAULT 'CNN Top Stories',
  `clock` varchar(255) NOT NULL DEFAULT '12',
  `clockname` varchar(255) NOT NULL DEFAULT '12 Hour',
  `city` varchar(255) NOT NULL DEFAULT 'N/A',
  `state` varchar(3) NOT NULL DEFAULT 'N/A',
  `CustomLocation` varchar(1) NOT NULL DEFAULT 'N',
  `temp` varchar(1) NOT NULL DEFAULT 'f',
  `stocks` varchar(2000) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `tstat` varchar(1) NOT NULL DEFAULT 'n',
  `spotify` varchar(255) NOT NULL DEFAULT 'spotify:user:spotifycharts:playlist:37i9dQZEVXbLRQDuF5jeBp',
  `spotname` varchar(255) NOT NULL DEFAULT 'U.S. Top 50',
  `style` varchar(1) NOT NULL DEFAULT 'l',
  `gmail` varchar(3) NOT NULL DEFAULT 'no',
  `bg` varchar(1) NOT NULL DEFAULT 'n',
  `bgurl` varchar(255) DEFAULT NULL,
  `refresh` int(7) NOT NULL DEFAULT '300000',
  `refreshname` varchar(10) NOT NULL DEFAULT '5 Minutes',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- (C) 2017 Complex Design Groups, Co.
