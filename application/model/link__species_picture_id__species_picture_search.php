<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class link__species_picture_id__species_picture_search extends Model
{
var $schema = "CREATE TABLE `link__species_picture_id__species_picture_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_picture_id` int(11) NOT NULL,
  `id_species_picture_search` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_species_picture_id` (`id_species_picture_id`,`id_species_picture_search`),
  KEY `id_species_picture_search` (`id_species_picture_search`),
  CONSTRAINT `link__species_picture_id__species_picture_search_ibfk_1` FOREIGN KEY (`id_species_picture_search`) REFERENCES `species_picture_search` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `link__species_picture_id__species_picture_search_ibfk_2` FOREIGN KEY (`id_species_picture_id`) REFERENCES `species_picture_id` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=496942 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_picture_id","id_species_picture_search","date","status");

var $validate = array(
	'id_species_picture_id' => array(
		'reference_to' => array('The constraint to species_picture_id.id isn\'t respected.','species_picture_id', 'id')
	),
	'id_species_picture_search' => array(
		'reference_to' => array('The constraint to species_picture_search.id isn\'t respected.','species_picture_search', 'id')
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
