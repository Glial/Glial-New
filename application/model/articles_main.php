<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class articles_main extends Model
{
var $schema = "CREATE TABLE `articles_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` int(11) DEFAULT NULL,
  `id_articles_type` int(11) NOT NULL,
  `id_language` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `date_validated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

var $field = array("id","etat","id_articles_type","id_language","date_posted","date_validated");

var $validate = array(
	'etat' => array(
		'numeric' => array('This must be an int.')
	),
	'id_articles_type' => array(
		'reference_to' => array('The constraint to articles_type.id isn\'t respected.','articles_type', 'id')
	),
	'id_language' => array(
		'reference_to' => array('The constraint to language.id isn\'t respected.','language', 'id')
	),
	'date_posted' => array(
		'time' => array('This must be a time.')
	),
	'date_validated' => array(
		'time' => array('This must be a time.')
	),
);

function get_validate()
{
return $this->validate;
}
}
