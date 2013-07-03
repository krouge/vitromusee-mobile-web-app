<?php

class AutoLoader {  

    public static function loadModel($class) {

        if(file_exists("Models/".$class .".php")) {

            require_once("Models/".$class .".php");
            //echo "Model/class.".$class .".php\n";
        }        
    }

    public static function loadService($class) {

        if(file_exists("Services/".$class.".php")) {
            require_once("Services/".$class .".php");
        }        
    }
}

spl_autoload_register(array('AutoLoader', 'loadModel'));
spl_autoload_register(array('AutoLoader', 'loadService'));