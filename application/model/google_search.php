<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class google_search extends Model
{
var $schema = "CREATE TABLE `google_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_main` int(11) NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `key_words` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=854 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

var $field = array("id","id_user_main","ip","date","key_words","referer");

var $validate = array(
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'key_words' => array(
		'not_empty' => array('This field is requiered.')
	),
	'referer' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
