<?php

use \Glial\Synapse\Controller;
use \Glial\Acl\Acl;

class Home extends Controller
{
	function index()
	{
		$this->layout_name = 'default';
		
		
		$this->title = __("Home");
		$this->ariane = " > ".__("Welcome to my first page with Glial !");
		
		//$this->javascript = array("");
		
	}
}
