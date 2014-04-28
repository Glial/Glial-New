<?php

use \Glial\Synapse\Controller;

class Error extends Controller
{
	function index()
	{
		$this->layout_name = 'default';
		
		
		$this->title = __("Home");
		$this->ariane = " > ".__("Welcome to my first page with Glial !");
		
		//$this->javascript = array("");
		
	}
    
    function _404()
    {
		$this->title = __("Error 404");
		$this->ariane = " > ".__("This page doesn't exit !");
        
        die("vwdfg");
    }
    
    
}
