<?php

// GET index route
$app->get('/', function () use ($app) {
   
   $array = array ('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

   header('Content-Type: application/json');
   echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

});
