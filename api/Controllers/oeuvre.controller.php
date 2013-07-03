<?php

$app->get('/oeuvre', function () use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$oeuvreManager = new OeuvreManager ();
	$oeuvres = $oeuvreManager->getAll();

	$mediaManager = new MediaManager();

	foreach ($oeuvres as $oeuvre) {

		$medias = $mediaManager->getById($oeuvre->getIdOeuvre());
		$oeuvre->setMedia($medias);
	}

	echo $callback . '('.json_encode($oeuvres).')';

});


$app->get('/oeuvre/:id', function ($id) use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$oeuvreManager = new OeuvreManager ();
	$oeuvre = $oeuvreManager->getById($id);

	$mediaManager = new MediaManager();
	$medias = $mediaManager->getById($oeuvre->getIdOeuvre());	

	$oeuvre->setMedia($medias);

	echo $callback . '('.json_encode($oeuvre).')';

});
