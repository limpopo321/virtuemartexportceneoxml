DROP TABLE IF EXISTS `#__virtuemart_exportceneoxml`;
 
CREATE TABLE `#__virtuemart_exportceneoxml` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` boolean,
  `name` varchar(255),
  `time_updated` DATETIME,
  `time_add` DATETIME,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__virtuemart_exportceneoxml`  VALUES
(1, 0, 'ceneo', NOW(), NOW())
