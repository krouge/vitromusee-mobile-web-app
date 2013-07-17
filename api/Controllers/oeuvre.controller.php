<?php

$app->get('/oeuvre', function () use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$oeuvreManager = new OeuvreManager();
	$artisteManager =  new ArtisteManager();

	$oeuvres = $oeuvreManager->getAll();
			
		foreach ($oeuvres as $oeuvre) {
			$artistes = $artisteManager->getArtistesByOeuvre($oeuvre->getIdOeuvre());
			$oeuvre->setArtistes($artistes);
		}

	echo $callback . '('.json_encode($oeuvres).')';

});


$app->get('/oeuvre/:id', function ($id) use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$oeuvreManager = new OeuvreManager ();
	$oeuvre = $oeuvreManager->getById($id);

	$artisteManager =  new ArtisteManager();
	$artistes = $artisteManager->getArtistesByOeuvre($oeuvre->getIdOeuvre());

	$oeuvre->setArtistes($artistes);

	$mediaManager = new MediaManager();
	$medias = $mediaManager->getById($oeuvre->getIdOeuvre());	

	$oeuvre->setMedia($medias);

	echo $callback . '('.json_encode($oeuvre).')';

});
