<?php

use \Glial\Synapse\Controller;
use \Glial\Cli\Glial;
use \Glial\Cli\Color;

class Install extends Controller
{

    function index()
    {
        $this->view = false;

        //for display like putty in utf8
        shell_exec('echo -ne \'\\\\e%G\\\\e[?47h\\\\e%G\\\\e[?47l\\\'');

        echo PHP_EOL . Glial::header() . PHP_EOL;

        echo $this->out("Installation in progress ...", "OK");


        $res = shell_exec("git --version");
        if (!preg_match("/^git version [1]\.[0-9]+\.[0-9]/i", $res, $gg)) {
            $errors['git'] = true;
        }

        if (version_compare(PHP_VERSION, '5.5.10', '<')) {
            $errors['php'] = PHP_VERSION;
        }

        if (!extension_loaded('gd')) {
            $errors['gd'] = true;
        }

        if (!extension_loaded('mysqli')) {
            $errors['mysqli'] = true;
        }

        if (!extension_loaded('curl')) {
            $errors['curl'] = true;
        }

        if (!extension_loaded('ssh2')) {
            $errors['ssh2'] = true;
        }


        if (!empty($errors)) {
            echo $this->out("Check dependencies ...", "KO");

            echo Color::getColoredString("Some settings on your machine make Glial unable to work properly.", "red") . PHP_EOL;
            echo Color::getColoredString("Make sure that you fix the issues listed below and run this script again:", "red") . PHP_EOL;




            foreach ($errors as $error => $current) {

                $displayIniMessage = false;

                switch ($error) {
                    case 'gd':
                        $text = PHP_EOL . "The gd extension is missing." . PHP_EOL;
                        $text .= "Install it (\# apt-get install php5-gd) or recompile php without --disable-gd";
                        $displayIniMessage = true;
                        break;

                    case 'git':
                        $text = PHP_EOL . "The git software is missing." . PHP_EOL;
                        $text .= "Install it (\# apt-get install git)";
                        $displayIniMessage = true;
                        break;

                    case 'mysqli':
                        $text = PHP_EOL . "The mysqli extension is missing." . PHP_EOL;
                        $text .= "Install it or recompile php without --disable-mysqli";
                        $displayIniMessage = true;
                        break;


                    case 'curl':
                        $text = PHP_EOL . "The curl extension is missing." . PHP_EOL;
                        $text .= "Install it or recompile php without --disable-curl";
                        $displayIniMessage = true;
                        break;

                    case 'phar':
                        $text = PHP_EOL . "The phar extension is missing." . PHP_EOL;
                        $text .= "Install it or recompile php without --disable-phar";
                        $displayIniMessage = true;
                        break;

                    case 'unicode':
                        $text = PHP_EOL . "The detect_unicode setting must be disabled." . PHP_EOL;
                        $text .= "Add the following to the end of your `php.ini`:" . PHP_EOL;
                        $text .= "    detect_unicode = Off";
                        $displayIniMessage = true;
                        break;

                    case 'suhosin':
                        $text = PHP_EOL . "The suhosin.executor.include.whitelist setting is incorrect." . PHP_EOL;
                        $text .= "Add the following to the end of your `php.ini` or suhosin.ini (Example path [for Debian]: /etc/php5/cli/conf.d/suhosin.ini):" . PHP_EOL;
                        $text .= "    suhosin.executor.include.whitelist = phar " . $current;
                        $displayIniMessage = true;
                        break;

                    case 'php':
                        $text = PHP_EOL . "Your PHP ({$current}) is too old, you must upgrade to PHP 5.5.10 or higher.";
                        $displayIniMessage = true;
                        break;

                    case 'allow_url_fopen':
                        $text = PHP_EOL . "The allow_url_fopen setting is incorrect." . PHP_EOL;
                        $text .= "Add the following to the end of your `php.ini`:" . PHP_EOL;
                        $text .= "    allow_url_fopen = On";
                        $displayIniMessage = true;
                        break;

                    case 'ioncube':
                        $text = PHP_EOL . "Your ionCube Loader extension ($current) is incompatible with Phar files." . PHP_EOL;
                        $text .= "Upgrade to ionCube 4.0.9 or higher or remove this line (path may be different) from your `php.ini` to disable it:" . PHP_EOL;
                        $text .= "    zend_extension = /usr/lib/php5/20090626+lfs/ioncube_loader_lin_5.3.so";
                        $displayIniMessage = true;
                        break;
                }
                if ($displayIniMessage) {
                    //$text .= $iniMessage;
                    echo Color::getColoredString($text, "yellow") . PHP_EOL;
                }
            }

            $this->onError();
        } else {
            echo $this->out("Check dependencies ", "OK");
        }


        //making tree directory
        $dirs = array("data", "data/img", "documentation", "tmp/crop", "tmp/documentation", "application/webroot/js",
            "application/webroot/css", "application/webroot/file", "application/webroot/video", "application/webroot/image");

        $error = array();
        foreach ($dirs as $dir) {

            $dir = $_SERVER['PWD'] . "/" . $dir;

            if (!file_exists($dir)) {
                if (!mkdir($dir)) {
                    $errors[$dir] = true;
                }
            }
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $val) {
                echo $this->out("Impossible to create this directory : " . $key . " ", "KO");
            }
            exit;
        }

        echo $this->out("Making tree directory ", "OK");


        shell_exec("cd " . $_SERVER['PWD'] . "/application/webroot/js && wget -q http://code.jquery.com/jquery-latest.min.js");

        $jQuery = $_SERVER['PWD'] . "/application/webroot/js/jquery-latest.min.js ";

        if (file_exists($jQuery)) {
            $data = file_get_contents($jQuery);

            preg_match("/v[\d]+\.[\d]+\.[\d]+/", $data, $version);

            echo $this->out("jQuery installed (" . Color::getColoredString($version[0], "green") . ")", "OK");
        } else {
            echo $this->out("Making tree directory ", "KO");
        }

        shell_exec("chown www-data:www-data -R *");
        echo $this->out("Setting right to www-data:www-data ", "OK");

        $code_retour = "";


        passthru("php glial administration admin_index_unique", $code_retour);


        if ($code_retour !== 0) {
            $fine = false;
        } else {
            $fine = true;
        }


        //echo $hh;
        echo $this->out("Generating DDL cash for index ", $fine);

        //     echo $hh;


        system("./glial administration admin_table");
        echo $this->out("generate DDL cash file for databases ", "OK");

        system("./glial administration generate_model");
        echo $this->out("Making model with reverse engineering of databases ", "OK");


        /*
          shell_exec("find " . $_SERVER['PWD'] . " -type f -exec chmod 740 {} \;;");
          echo $this->out("Setting chmod 440 to all files", "OK");

          shell_exec("find " . $_SERVER['PWD'] . " -type d -exec chmod 750 {} \;;");
          echo $this->out("Setting chmod 550 to all files", "OK");


          shell_exec("find " . $_SERVER['PWD'] . "/tmp -type f -exec chmod 770 {} \;;");
          echo $this->out("Setting chmod 660 to all files of /tmp", "OK");

          shell_exec("find " . $_SERVER['PWD'] . "/tmp -type d -exec chmod 770 {} \;;");
          echo $this->out("Setting chmod 660 to all directory of /tmp", "OK");

          shell_exec("chmod +x glial");
          echo $this->out("Setting chmod +x to executable 'glial'", "OK");
         */

        echo PHP_EOL;
    }

    public function out($msg, $type)
    {
        switch ($type) {
            case 'OK':
            case true: $status = Color::getColoredString("OK", "green");
                break;

            case 'KO':
            case false:
                $status = Color::getColoredString("KO", "red");
                $msg = Color::getColoredString($msg, "red");
                $err = true;
                break;
            case 'NA': $status = Color::getColoredString("!!", "blue");
                break;
        }



        $ret = $msg . str_repeat(".", 76 - strlen(Color::strip($msg))) . " [" . $status . "]" . PHP_EOL;


        if (!empty($err)) {
            echo $ret;
            $this->onError();
        }



        return $ret;
    }

    public function onError()
    {

        echo PHP_EOL . "To understand what happen : " . Color::getColoredString("glial/tmp/log/error_php.log", "cyan") . PHP_EOL;
        echo "To resume the setup : " . Color::getColoredString("php composer.phar update", "cyan") . PHP_EOL;
        exit(10);
    }

}
