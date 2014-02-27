<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_source_main extends Model
{
var $schema = "CREATE TABLE `species_source_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `pic16` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8";

var $field = array("id","name","url","date_created","date_updated","pic16");

var $validate = array(
	'name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'url' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date_created' => array(
		'time' => array('This must be a time.')
	),
	'date_updated' => array(
		'time' => array('This must be a time.')
	),
	'pic16' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
