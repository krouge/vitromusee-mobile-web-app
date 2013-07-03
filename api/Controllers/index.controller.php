<?php


$app->get('/', function () use ($app) {
   
  $app->halt(403, 'You shall not pass!');

});
