<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_picture_tag extends Model
{
var $schema = "CREATE TABLE `species_picture_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=29554 DEFAULT CHARSET=utf8";

var $field = array("id","tag");

var $validate = array(
	'tag' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
