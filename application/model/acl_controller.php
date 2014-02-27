<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class acl_controller extends Model
{
var $schema = "CREATE TABLE `acl_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

var $field = array("id","name");

var $validate = array(
	'name' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
