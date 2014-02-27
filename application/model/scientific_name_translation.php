<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class scientific_name_translation extends Model
{
var $schema = "CREATE TABLE `scientific_name_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_main` int(11) NOT NULL,
  `id_species_sub` int(11) DEFAULT NULL,
  `language` char(3) NOT NULL,
  `text` varchar(100) NOT NULL,
  `is_valid` int(11) NOT NULL,
  `is_black_list` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_species_main` (`id_species_main`,`language`,`text`,`id_species_sub`),
  KEY `id_species_sub` (`id_species_sub`),
  KEY `language` (`language`),
  CONSTRAINT `scientific_name_translation_ibfk_1` FOREIGN KEY (`id_species_main`) REFERENCES `species_main` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43987 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_main","id_species_sub","language","text","is_valid","is_black_list");

var $validate = array(
	'id_species_main' => array(
		'reference_to' => array('The constraint to species_main.id isn\'t respected.','species_main', 'id')
	),
	'id_species_sub' => array(
		'reference_to' => array('The constraint to species_sub.id isn\'t respected.','species_sub', 'id')
	),
	'language' => array(
		'not_empty' => array('This field is requiered.')
	),
	'text' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_valid' => array(
		'numeric' => array('This must be an int.')
	),
	'is_black_list' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
