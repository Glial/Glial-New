<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class mysql_dump extends Model
{
var $schema = "CREATE TABLE `mysql_dump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mysql_server` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `time` time NOT NULL,
  `database` varchar(30) CHARACTER SET utf8 NOT NULL,
  `master_log_file` varchar(40) CHARACTER SET utf8 NOT NULL,
  `mater_log_pos` int(11) NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `md5` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `is_gziped` int(11) NOT NULL DEFAULT '0',
  `is_available` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_mysql_serveur` (`id_mysql_server`),
  CONSTRAINT `mysql_dump_ibfk_1` FOREIGN KEY (`id_mysql_server`) REFERENCES `mysql_server` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8mb4";

var $field = array("id","id_mysql_server","date_start","date_end","time","database","master_log_file","mater_log_pos","file_name","md5","is_gziped","is_available");

var $validate = array(
	'id_mysql_server' => array(
		'reference_to' => array('The constraint to mysql_server.id isn\'t respected.','mysql_server', 'id')
	),
	'date_start' => array(
		'datetime' => array('This must be a date time.')
	),
	'date_end' => array(
		'datetime' => array('This must be a date time.')
	),
	'time' => array(
		'time' => array('This must be a time.')
	),
	'database' => array(
		'not_empty' => array('This field is requiered.')
	),
	'master_log_file' => array(
		'not_empty' => array('This field is requiered.')
	),
	'mater_log_pos' => array(
		'numeric' => array('This must be an int.')
	),
	'file_name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'md5' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_gziped' => array(
		'numeric' => array('This must be an int.')
	),
	'is_available' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
