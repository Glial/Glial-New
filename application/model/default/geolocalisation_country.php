<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class geolocalisation_country extends Model
{
var $schema = "CREATE TABLE `geolocalisation_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_geolocalisation_continent` int(11) NOT NULL,
  `name_fr` varchar(250) NOT NULL,
  `name_eng` varchar(200) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `name_webtitle` varchar(255) NOT NULL,
  `adj` varchar(200) NOT NULL,
  `iso` char(2) NOT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `population` int(10) unsigned NOT NULL DEFAULT '0',
  `latitude` float NOT NULL DEFAULT '0',
  `longitude` float NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `num_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iso` (`iso`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8";

var $field = array("id","id_geolocalisation_continent","name_fr","name_eng","libelle","alias","name_webtitle","adj","iso","iso3","population","latitude","longitude","description","num_code");

var $validate = array(
	'id_geolocalisation_continent' => array(
		'reference_to' => array('The constraint to geolocalisation_continent.id isn\'t respected.','geolocalisation_continent', 'id')
	),
	'name_fr' => array(
		'not_empty' => array('This field is requiered.')
	),
	'name_eng' => array(
		'not_empty' => array('This field is requiered.')
	),
	'libelle' => array(
		'not_empty' => array('This field is requiered.')
	),
	'alias' => array(
		'not_empty' => array('This field is requiered.')
	),
	'name_webtitle' => array(
		'not_empty' => array('This field is requiered.')
	),
	'adj' => array(
		'not_empty' => array('This field is requiered.')
	),
	'iso' => array(
		'not_empty' => array('This field is requiered.')
	),
	'iso3' => array(
		'not_empty' => array('This field is requiered.')
	),
	'population' => array(
		'numeric' => array('This must be an int.')
	),
	'latitude' => array(
		'decimal' => array('This must be a float.')
	),
	'longitude' => array(
		'decimal' => array('This must be a float.')
	),
	'description' => array(
		'not_empty' => array('This field is requiered.')
	),
	'num_code' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
