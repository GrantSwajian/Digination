CREATE TABLE IF NOT EXISTS `event` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `location` varchar(255) NOT NULL,
    `body` text NOT NULL,
    `time` time NOT NULL,
    `date` date NOT NULL,
    `eventtype` text NOT NULL,
    `online` text NOT NULL,
    `amount` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;