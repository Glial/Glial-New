<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class comment__species_picture_main extends Model
{
var $schema = "CREATE TABLE `comment__species_picture_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_species_picture_main` int(11) NOT NULL,
  `id_user_main` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_language` char(5) NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  `subscribe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8";

var $field = array("id","id_species_picture_main","id_user_main","id_parent","id_language","date","text","subscribe");

var $validate = array(
	'id_species_picture_main' => array(
		'reference_to' => array('The constraint to species_picture_main.id isn\'t respected.','species_picture_main', 'id')
	),
	'id_user_main' => array(
		'reference_to' => array('The constraint to user_main.id isn\'t respected.','user_main', 'id')
	),
	'id_parent' => array(
		'reference_to' => array('The constraint to parent.id isn\'t respected.','parent', 'id')
	),
	'id_language' => array(
		'reference_to' => array('The constraint to language.id isn\'t respected.','language', 'id')
	),
	'date' => array(
		'time' => array('This must be a time.')
	),
	'text' => array(
		'not_empty' => array('This field is requiered.')
	),
	'subscribe' => array(
		'numeric' => array('This must be an int.')
	),
);

function get_validate()
{
return $this->validate;
}
}
