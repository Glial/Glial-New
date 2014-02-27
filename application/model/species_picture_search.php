<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_picture_search extends Model
{
var $schema = "CREATE TABLE `species_picture_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_main` int(11) NOT NULL,
  `id_species_source_main` int(11) NOT NULL,
  `id_scientific_name_translation` int(11) NOT NULL,
  `tag_search` varchar(100) NOT NULL,
  `language` char(5) NOT NULL,
  `total_found` int(11) NOT NULL,
  `id_user_main` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `is_valid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_species_main_2` (`id_species_main`,`tag_search`,`language`),
  KEY `id_species_main` (`id_species_main`),
  KEY `id_user_main` (`id_user_main`),
  KEY `id_species_source_main` (`id_species_source_main`),
  CONSTRAINT `species_picture_search_ibfk_1` FOREIGN KEY (`id_species_main`) REFERENCES `species_main` (`id`),
  CONSTRAINT `species_picture_search_ibfk_2` FOREIGN KEY (`id_user_main`) REFERENCES `user_main` (`id`),
  CONSTRAINT `species_picture_search_ibfk_3` FOREIGN KEY (`id_species_source_main`) REFERENCES `species_source_main` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17286 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_main","id_species_source_main","id_scientific_name_translation","tag_search","language","total_found","id_user_main","date","is_valid");

var $validate = array(
	'id_species_main' => array(
		'reference_to' => array('The constraint to species_main.id isn\'t respected.','species_main', 'id')
	),
	'id_species_source_main' => array(
		'reference_to' => array('The constraint to species_source_main.id isn\'t respected.','species_source_main', 'id')
	),
	'id_scientific_name_translation' => array(
		'reference_to' => array('The constraint to scientific_name_translation.id isn\'t respected.','scientific_name_translation', 'id')
	),
	'tag_search' => array(
		'not_empty' => array('This field is requiered.')
	),
	'language' => array(
		'not_empty' => array('This field is requiered.')
	),
	'total_found' => array(
		'numeric' => array('This must be an int.')
	),
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'date' => array(
		'time' => array('This must be a time.')
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
