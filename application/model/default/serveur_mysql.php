<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class serveur_mysql extends Model
{
var $schema = "CREATE TABLE `serveur_mysql` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL,
  `port` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  `architecture` char(5) NOT NULL,
  `is_slave` int(11) NOT NULL,
  `is_master` int(11) NOT NULL,
  `ip_master` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

var $field = array("id","ip","port","version","architecture","is_slave","is_master","ip_master");

var $validate = array(
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'port' => array(
		'numeric' => array('This must be an int.')
	),
	'version' => array(
		'not_empty' => array('This field is requiered.')
	),
	'architecture' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_slave' => array(
		'numeric' => array('This must be an int.')
	),
	'is_master' => array(
		'numeric' => array('This must be an int.')
	),
	'ip_master' => array(
		'ip' => array('your IP is not valid')
	),
);

function get_validate()
{
return $this->validate;
}
}
