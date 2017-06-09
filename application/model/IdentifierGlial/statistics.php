<?php

namespace Application\Model\IdentifierGlial;
use \Glial\Synapse\Model;
class statistics extends Model
{
var $schema = "CREATE TABLE `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_main` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `http_status` int(11) NOT NULL,
  `http_method` chat(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ip` char(15) NOT NULL,
  `variable` text NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

var $field = array("id","id_user_main","date","http_status","http_method","ip","link","user_agent","variable");

var $validate = array(
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'date' => array(
		'dateTime' => array('This must be a datetime.')
	),
	'http_status' => array(
		'numeric' => array('This must be an int.')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
);

function get_validate()
{
return $this->validate;
}
}
