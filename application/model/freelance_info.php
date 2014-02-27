<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class freelance_info extends Model
{
var $schema = "CREATE TABLE `freelance_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_freelance_info` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `TJM` varchar(200) NOT NULL,
  `start` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `inserted` datetime NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3115 DEFAULT CHARSET=utf8";

var $field = array("id","ref_freelance_info","title","date","author","location","duration","TJM","start","description","inserted","email");

var $validate = array(
	'ref_freelance_info' => array(
		'numeric' => array('This must be an int.')
	),
	'title' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date' => array(
		'date' => array('This must be a date.')
	),
	'author' => array(
		'not_empty' => array('This field is requiered.')
	),
	'location' => array(
		'not_empty' => array('This field is requiered.')
	),
	'duration' => array(
		'not_empty' => array('This field is requiered.')
	),
	'TJM' => array(
		'not_empty' => array('This field is requiered.')
	),
	'start' => array(
		'not_empty' => array('This field is requiered.')
	),
	'description' => array(
		'not_empty' => array('This field is requiered.')
	),
	'inserted' => array(
		'time' => array('This must be a time.')
	),
	'email' => array(
		'email' => array('your email is not valid')
	),
);

function get_validate()
{
return $this->validate;
}
}
