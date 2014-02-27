<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_iucn extends Model
{
var $schema = "CREATE TABLE `species_iucn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_iucn` char(2) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `cf_order` int(11) NOT NULL,
  `color` char(6) NOT NULL,
  `background` char(6) NOT NULL,
  `is_valid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_iucn` (`code_iucn`,`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8";

var $field = array("id","code_iucn","libelle","cf_order","color","background","is_valid");

var $validate = array(
	'code_iucn' => array(
		'not_empty' => array('This field is requiered.')
	),
	'libelle' => array(
		'not_empty' => array('This field is requiered.')
	),
	'cf_order' => array(
		'numeric' => array('This must be an int.')
	),
	'color' => array(
		'not_empty' => array('This field is requiered.')
	),
	'background' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_valid' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
