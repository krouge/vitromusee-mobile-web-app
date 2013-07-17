<?php

$app->get('/agenda/:annee/:mois', function ($annee, $mois) use($app) {
    
	$callback = $app->request()->params('callback');

    $evenementManager = new EvenementManager();
    $evenements = $evenementManager->getByDate($annee,$mois);

    //echo json_encode($evenements);
	echo $callback . '('.json_encode($evenements).')';

});

