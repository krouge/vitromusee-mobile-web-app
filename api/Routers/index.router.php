<?php



// GET index route
$app->get('/', function () use ($app) {
   
   $array = array ('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

   echo json_encode($array);

});
