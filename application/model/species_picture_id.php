<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class species_picture_id extends Model
{
var $schema = "CREATE TABLE `species_picture_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_author` int(11) NOT NULL,
  `photo_id` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `miniature` varchar(100) NOT NULL,
  `to_delete` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `photo_id` (`photo_id`),
  KEY ` id_species_author` (`id_species_author`),
  CONSTRAINT `species_picture_id_ibfk_1` FOREIGN KEY (`id_species_author`) REFERENCES `species_author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=496920 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_author","photo_id","link","miniature","to_delete","date","status");

var $validate = array(
	'id_species_author' => array(
		'reference_to' => array('The constraint to species_author.id isn\'t respected.','species_author', 'id')
	),
	'photo_id' => array(
		'not_empty' => array('This field is requiered.')
	),
	'link' => array(
		'not_empty' => array('This field is requiered.')
	),
	'miniature' => array(
		'not_empty' => array('This field is requiered.')
	),
	'to_delete' => array(
		'numeric' => array('This must be an int.')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'status' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
