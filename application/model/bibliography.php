<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class bibliography extends Model
{
var $schema = "CREATE TABLE `bibliography` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crc32` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `crc32` (`crc32`)
) ENGINE=InnoDB AUTO_INCREMENT=41276 DEFAULT CHARSET=utf8";

var $field = array("id","crc32","text");

var $validate = array(
	'crc32' => array(
		'numeric' => array('This must be an int.')
	),
	'text' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
