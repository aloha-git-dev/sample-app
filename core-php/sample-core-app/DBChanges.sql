
CREATE TABLE IF NOT EXISTS `adr_addresses` (
  `adr_i_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adr_s_street` varchar(100) NOT NULL DEFAULT '',
  `adr_s_city` varchar(25) NOT NULL DEFAULT '',
  `adr_s_state` varchar(25) NOT NULL DEFAULT '',
  `adr_s_zip` varchar(10) NOT NULL DEFAULT '',
  `adr_d_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adr_d_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adr_d_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`adr_i_id`),
  UNIQUE KEY `unique_index` (`adr_s_street`,`adr_s_city`,`adr_s_state`),
  KEY `adr_d_created_at` (`adr_d_created_at`)
) ENGINE=InnoDB;
