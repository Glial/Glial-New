<?php

use \Glial\Synapse\Controller;

class Layout extends Controller {

    function header($title) {
        $this->set('GLIALE_TITLE', $title);
        
        //$this->di['js']->code_javascript("$('.carousel').carousel()");
    }

    function footer() {
        
    }

    function debug() {
        
    }

}
