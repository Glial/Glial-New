<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class statistique_main extends Model
{
var $schema = "CREATE TABLE `statistique_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_main` int(11) NOT NULL,
  `query_string` varchar(1024) NOT NULL,
  `referer` varchar(1024) NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `accept_language` varchar(20) NOT NULL,
  `country` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date_created`),
  KEY `query_string` (`query_string`(333))
) ENGINE=MyISAM AUTO_INCREMENT=1755789 DEFAULT CHARSET=utf8";

var $field = array("id","id_user_main","query_string","referer","date_created","ip","user_agent","accept_language","country");

var $validate = array(
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'query_string' => array(
		'not_empty' => array('This field is requiered.')
	),
	'referer' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date_created' => array(
		'time' => array('This must be a time.')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'user_agent' => array(
		'not_empty' => array('This field is requiered.')
	),
	'accept_language' => array(
		'not_empty' => array('This field is requiered.')
	),
	'country' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
