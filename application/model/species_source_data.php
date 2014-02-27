<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_source_data extends Model
{
var $schema = "CREATE TABLE `species_source_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_source_detail` int(11) NOT NULL,
  `type` char(10) NOT NULL,
  `date` datetime NOT NULL,
  `data` text NOT NULL,
  `is_parsed` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_species_source_detail` (`id_species_source_detail`),
  KEY `type` (`type`),
  CONSTRAINT `species_source_data_ibfk_1` FOREIGN KEY (`id_species_source_detail`) REFERENCES `species_source_detail` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122777 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_source_detail","type","date","data","is_parsed");

var $validate = array(
	'id_species_source_detail' => array(
		'reference_to' => array('The constraint to species_source_detail.id isn\'t respected.','species_source_detail', 'id')
	),
	'type' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'data' => array(
		'not_empty' => array('This field is requiered.')
	),
	'is_parsed' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
