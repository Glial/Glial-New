<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class mysql_replication_thread extends Model
{
var $schema = "CREATE TABLE `mysql_replication_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mysql_server` int(11) NOT NULL,
  `channel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_mysql_server` (`id_mysql_server`,`channel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

var $field = array("id","id_mysql_server","channel");

var $validate = array(
	'id_mysql_server' => array(
		'reference_to' => array('The constraint to mysql_server.id isn\'t respected.','mysql_server', 'id')
	),
	'channel' => array(
		'not_empty' => array('This field is requiered.')
	),
);

function get_validate()
{
return $this->validate;
}
}
