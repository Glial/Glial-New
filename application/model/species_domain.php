<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_domain extends Model
{
var $schema = "CREATE TABLE `species_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scientific_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";

var $field = array("id","scientific_name");

var $validate = array(
	'scientific_name' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
