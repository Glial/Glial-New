<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_author extends Model
{
var $schema = "CREATE TABLE `species_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_source_main` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `key` varchar(100) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(80) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `main_page` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=139790 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_source_main","date","key","firstname","name","email","surname","main_page");

var $validate = array(
	'id_species_source_main' => array(
		'reference_to' => array('The constraint to species_source_main.id isn\'t respected.','species_source_main', 'id')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'key' => array(
		'not_empty' => array('This field is requiered.')
	),
	'firstname' => array(
		'not_empty' => array('This field is requiered.')
	),
	'name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'email' => array(
		'email' => array('your email is not valid')
	),
	'surname' => array(
		'not_empty' => array('This field is requiered.')
	),
	'main_page' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
