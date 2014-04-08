<?php

use \Glial\Synapse\Controller;
use \Glial\Acl\Acl;
use \Glial\Shell\Table;
use \Glial\Shell\Color;
use \Glial\Shell\Glial;

class Test extends Controller
{

    function index()
    {
        $this->view = false;


        $tab = new Table(0);
        $tab->addHeader(array("top", "colonne", "Libelle"));
        $tab->addLine(array("3", "sfhgh", "dfxhxsfht"));
        $tab->addLine(array("2", Color::getColoredString("Testing Colors class, " . Color::getColoredString("Testing Colors class, this is purple string on yellow background.", "red", "blue") . " is purple string on yellow background.", "purple", "yellow"), "dfxhxsfht6"));

        for ($i = 0; $i < 10; $i++) {

            $tab->flushAll();
            $tab->addHeader(array("top", date('H:i:s'), "Libelle"));
            $tab->addLine(array("3", "sfhgh", "dfxhxsfht"));
            $tab->addLine(array("2", Color::getColoredString("Testing Colors class, " . Color::getColoredString("Testing Colors class, this is purple string on yellow background.", "red", "blue") . " is purple string on yellow background.", "purple", "yellow"), "dfxhxsfht6"));

            $data = $tab->display();
            
            $gg = substr_count($data, "\n");
            
            echo $data;

            sleep(1);
            
            echo "\033[".$gg."A";
        }

        echo "\033[".$gg."B";

    }

}
