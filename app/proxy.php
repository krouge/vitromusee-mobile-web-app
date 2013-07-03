<?php
    //$search = urlencode($_REQUEST['placename']);    
    $api = "http://10.192.81.250:8888/vitromusee-mobile-web-app/api/theme";    
    header("content-type: application/json");
    echo file_get_contents($api); 