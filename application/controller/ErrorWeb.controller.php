<?php

use \Glial\Synapse\Controller;

class ErrorWeb extends Controller
{
    //use \Glial\Neuron\Controller\Error as gg;
    
    function error404()
    {
		$this->title = __("Error 404");
		$this->ariane = " > ".__("This page doesn't exit !");
        
        
    }
    
    
}