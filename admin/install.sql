DROP TABLE IF EXISTS `#__roster_data`;
DROP TABLE IF EXISTS `#__roster_settings`;
 
CREATE TABLE `#__roster_data` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `spec` VARCHAR(25) NOT NULL,
  `player_class` VARCHAR(25) NOT NULL,
  `race` VARCHAR(25) NOT NULL,
  `sex` VARCHAR(25) NOT NULL,
  `guild_rank` VARCHAR(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#_roster_settings` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `setting_type` VARCHAR(25) NOT NULL,
  `setting_value` VARCHAR(25) NOT NULL,
  `params` VARCHAR(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
--INSERT INTO `#__roster_data` (`greeting`) VALUES ('Hello, World!'), ('Bonjour, Monde!'), ('Ciao, Mondo!');
