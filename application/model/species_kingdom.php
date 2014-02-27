<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_kingdom extends Model
{
var $schema = "CREATE TABLE `species_kingdom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_domain` int(11) DEFAULT NULL,
  `id_history_etat` int(11) NOT NULL,
  `scientific_name` varchar(50) NOT NULL,
  `is_valid` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scientific_name` (`scientific_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_domain","id_history_etat","scientific_name","is_valid","date_created","date_updated");

var $validate = array(
	'id_species_domain' => array(
		'reference_to' => array('The constraint to species_domain.id isn\'t respected.','species_domain', 'id')
	),
	'id_history_etat' => array(
		'reference_to' => array('The constraint to history_etat.id isn\'t respected.','history_etat', 'id')
	),
	'scientific_name' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_valid' => array(
		'numeric' => array('This must be an int.')
	),
	'date_created' => array(
		'time' => array('This must be a time.')
	),
	'date_updated' => array(
		'time' => array('This must be a time.')
	),
);

function get_validate()
{
return $this->validate;
}
}
