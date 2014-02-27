<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class user_main_login extends Model
{
var $schema = "CREATE TABLE `user_main_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_main` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_logged` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

var $field = array("id","id_user_main","date","ip","user_agent","is_logged");

var $validate = array(
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'user_agent' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_logged' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
