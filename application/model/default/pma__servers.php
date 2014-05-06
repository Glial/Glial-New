<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class pma__servers extends Model
{
var $schema = "CREATE TABLE `pma__servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(100) NOT NULL,
  `ip` char(15) NOT NULL,
  `mysql_port` int(11) NOT NULL DEFAULT '3306',
  `mysql_user` varchar(20) NOT NULL DEFAULT 'root',
  `mysql_passwd` varchar(60) NOT NULL,
  `ssh_port` int(11) NOT NULL DEFAULT '22',
  `ssh_user` varchar(20) NOT NULL DEFAULT 'root',
  `ssh_passwd` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mysql_hostname` (`hostname`,`mysql_port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

var $field = array("id","hostname","ip","mysql_port","mysql_user","mysql_passwd","ssh_port","ssh_user","ssh_passwd","date");

var $validate = array(
	'hostname' => array(
		'not_empty' => array('This field is requiered.')
	),
	'ip' => array(
		'ip' => array('your IP is not valid')
	),
	'mysql_port' => array(
		'numeric' => array('This must be an int.')
	),
	'mysql_user' => array(
		'not_empty' => array('This field is requiered.')
	),
	'mysql_passwd' => array(
		'not_empty' => array('This field is requiered.')
	),
	'ssh_port' => array(
		'numeric' => array('This must be an int.')
	),
	'ssh_user' => array(
		'not_empty' => array('This field is requiered.')
	),
	'ssh_passwd' => array(
		'not_empty' => array('This field is requiered.')
	),
	'date' => array(
		'datetime' => array('This must be a date time.')
	),
);

function get_validate()
{
return $this->validate;
}
}
