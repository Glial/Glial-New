<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class link__species_picture__species_picture_tag extends Model
{
var $schema = "CREATE TABLE `link__species_picture__species_picture_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_picture_main` int(11) NOT NULL,
  `id_species_picture_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_species_picture_main` (`id_species_picture_main`,`id_species_picture_tag`),
  KEY `id_species_picture_tag` (`id_species_picture_tag`),
  CONSTRAINT `link__species_picture__species_picture_tag_ibfk_1` FOREIGN KEY (`id_species_picture_main`) REFERENCES `species_picture_main` (`id`),
  CONSTRAINT `link__species_picture__species_picture_tag_ibfk_2` FOREIGN KEY (`id_species_picture_tag`) REFERENCES `species_picture_tag` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29542 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_picture_main","id_species_picture_tag");

var $validate = array(
	'id_species_picture_main' => array(
		'reference_to' => array('The constraint to species_picture_main.id isn\'t respected.','species_picture_main', 'id')
	),
	'id_species_picture_tag' => array(
		'reference_to' => array('The constraint to species_picture_tag.id isn\'t respected.','species_picture_tag', 'id')
	),
);

function get_validate()
{
return $this->validate;
}
}
