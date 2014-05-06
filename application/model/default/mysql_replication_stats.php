<?php

namespace Application\Model\IdentifierDefault;
use \Glial\Synapse\Model;
class mysql_replication_stats extends Model
{
var $schema = "CREATE TABLE `mysql_replication_stats` (
  `id` int(11) NOT NULL,
  `mysql_replication_thread` int(11) NOT NULL,
  `thread_io` int(11) NOT NULL,
  `thread_sql` int(11) NOT NULL,
  `time_behind` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

var $field = array("id","mysql_replication_thread","thread_io","thread_sql","time_behind","date");

var $validate = array(
	'mysql_replication_thread' => array(
		'numeric' => array('This must be an int.')
	),
	'thread_io' => array(
		'numeric' => array('This must be an int.')
	),
	'thread_sql' => array(
		'numeric' => array('This must be an int.')
	),
	'time_behind' => array(
		'numeric' => array('This must be an int.')
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
