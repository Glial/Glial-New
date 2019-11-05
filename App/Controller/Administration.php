<?php


namespace App\Controller;

use \Glial\Synapse\Controller;

class Administration extends Controller {

    use \Glial\Neuron\Controller\Administration;

    public function test() {
        $this->view = false;
        echo "main";
    }

}
