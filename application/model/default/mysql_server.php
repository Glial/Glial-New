<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class mysql_server extends Model
{
var $schema = "CREATE TABLE `mysql_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ip` char(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `login` varchar(32) CHARACTER SET utf8 NOT NULL,
  `passwd` char(64) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `port` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4";

var $field = array("id","name","ip","login","passwd","port");

var $validate = array(
	'name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'login' => array(
		'not_empty' => array('This field is requiered.')
	),
	'passwd' => array(
		'not_empty' => array('This field is requiered.')
	),
	'port' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
