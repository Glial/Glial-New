<?php

namespace App\Controller;

use \Glial\Synapse\Controller;

class Debug extends Controller
{
    var $layout_name = 'debug';

    function index()
    {
        
    }

    function toolbar($param)
    {


        $data['page_generation'] = round((microtime(true) - $param[0]) * 1000, 3)."ms";

        $data['acl']      = $this->di['acl'];
        $data['memories'] = round(memory_get_peak_usage() / (1024 * 1024), 2)." Mo";


        $data['variables'] = (count($_REQUEST) + count($_POST) + count($_GET) + count($_COOKIE));


        $thread_sgbd = $this->di['db']->getConnected();

        foreach ($thread_sgbd as $name_db) {
            $db                              = $this->di['db']->sql($name_db);
            $data['db'][$name_db]['queries'] = $db->get_count_query();
            $data['db'][$name_db]['sql']     = base64_encode(json_encode($db->query));
        }

        $data['date'] = time();

        $_SESSION['debug'][] = $data;


        end($_SESSION['debug']);         // move the internal pointer to the end of the array
        $data['last_key'] = key($_SESSION['debug']);


        $this->set('data', $data);
    }

    function mysql($param)
    {
        $data['last_key'] = $param[0];
        $data['db']       = $param[1];

        $this->set('db', $data['db']);
        $this->set('last_key', $data['last_key']);


        $this->layout_name = 'debug';

        $db = $this->di['db']->sql($data['db']);



        $data['mysql'] = json_decode(base64_decode($_SESSION['debug'][$data['last_key']]['db'][$data['db']]['sql']), true);


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

    function leftmenu($val)
    {
        $val = (array) $val;


        foreach ($_SESSION['debug'][$val['last_key']]['db'] as $name => $db) {



            $tmp = array();

            $tmp['queries'] = $db['queries'];
            $tmp['time']    = 12;
            $tmp['name']    = $name;



            $val['menu'][] = $tmp;
        }



        $this->set('data', $val);
    }

    function stats()
    {
        //$this->layout_name = 'debug';

        $db = $this->di['db']->sql(DB_DEFAULT);


        $sql = "SELECT * FROM statistics ORDER BY id DESC LIMIT 50";

        $res = $db->sql_query($sql);

        $data = array();
        while ($arr  = $db->sql_fetch_array($res)) {
            $data['stats'][] = $arr;
        }


        $this->set('data', $data);
    }
}