<?php

use \Glial\Synapse\Controller;

class Debug extends Controller
{

    var $layout_name = 'debug';

    function index()
    {
        
    }

    function toolbar($param)
    {


        //debug( $this->di);

        $db = $this->di['db']->sql(DB_DEFAULT);

        $data['page_generation'] = round((microtime(true) - $param[0]) * 1000, 3)."ms";

        $data['acl']      = $this->di['acl'];
        $data['memories'] = round(memory_get_peak_usage() / (1024 * 1024), 2)." Mo";
        $data['request']  = count($_REQUEST);
        $data['queries']  = $db->get_count_query();

        $data['mysql'] = base64_encode(json_encode($db->query));

        $this->set('data', $data);
    }

    function mysql($param)
    {


        $this->layout_name = 'debug';

        $db = $this->di['db']->sql(DB_DEFAULT);

        $data['mysql'] = json_decode(base64_decode($param[0]), true);


        foreach ($data['mysql'] as $key => $mysql) {

            // if we make already expalin to not make a second time and generate an MySQL error
            if (substr($mysql['query'], 0, 7) !== "EXPLAIN") {

                $sql = "EXPLAIN format=json ".$mysql['query'];

                $res = $db->sql_query($sql);

                while ($ob = $db->sql_fetch_object($res)) {
                    //display table ?

                    $data['mysql'][$key]['explain'] = json_decode($ob->EXPLAIN, true);
                }
            }
        }



        $this->set('data', $data);
    }

    function header()
    {
        
    }

    function footer()
    {
        
    }

    function leftmenu()
    {
        
    }

    function stats()
    {
        //$this->layout_name = 'debug';

        $db = $this->di['db']->sql(DB_DEFAULT);


        $sql ="SELECT * FROM statistics ORDER BY id DESC LIMIT 50";

        $stats = array();
        while ($arr = $db->sql_fetch_array($sql))
        {
            $stats[] = $arr;
        }

        
        $this->set('data', $data);

    }
}