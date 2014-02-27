<?php

namespace Application\Model;
use \Glial\Synapse\Model;

class acl_action extends Model
{
var $schema = "CREATE TABLE `acl_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acl_controller` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

var $field = array("id","id_acl_controller","name");

var $validate = array(
	'id_acl_controller' => array(
		'reference_to' => array('The constraint to acl_controller.id isn\'t respected.','acl_controller', 'id')
	),
	'name' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
