<?php

namespace Application\Model\IdentifierGlial;
use \Glial\Synapse\Model;
class company extends Model
{
var $schema = "CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

var $field = array("id","date","libelle","logo");

var $validate = array(
	'date' => array(
		'dateTime' => array('This must be a datetime.')
	),
);

function get_validate()
{
return $this->validate;
}
}
