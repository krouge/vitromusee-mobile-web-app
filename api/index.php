<?php

require '_lib/Slim/Slim.php';
require '_lib/class.Config.php';
require '_lib/class.Core.php';
require '_lib/class.AutoLoader.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// $indexControlleur = new indexControlleur();
// $artisteController = new artisteController();

require_once 'Controllers/artiste.controller.php';
require_once 'Controllers/index.controller.php';
require_once 'Controllers/theme.controller.php';
require_once 'Controllers/oeuvre.controller.php';


$app->run();
