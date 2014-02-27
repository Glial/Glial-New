<?php 


use \Glial\Synapse\Controller;
use \Glial\Acl\Acl;


class Test extends Controller
{
	function index()
	{
		$this->layout_name = false;
		$this->view = false;
		
		$this->title = __("Home");
		$this->ariane = " > ".__("Welcome to my first page with Glial !");
		
		$this->javascript = array("");
		
		$acl = new Acl(1);

		$acl->setRessource();	
		$acl->loadIiniFile("/home/www/glial/configuration/acl.config.ini.php");
		
		$dd = $acl->__toString();

		echo $dd;
	}


}



