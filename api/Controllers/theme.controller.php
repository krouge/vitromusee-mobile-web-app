<?php

$app->get('/theme', function () use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$themeManager = new ThemeManager ();
	$themes = $themeManager->getAll();

	echo $callback . '('.json_encode($themes).')';

});



$app->get('/theme/:id', function ($id) use ($app) {

	$callback = $app->request()->params('jsonp_callback');

	$oeuvreManager = new OeuvreManager();
	$oeuvres = $oeuvreManager->getByTheme($id);

	$artisteManager =  new ArtisteManager();

	foreach ($oeuvres as $oeuvre) {

		$artistes = $artisteManager->getArtistesByOeuvre($oeuvre->getIdOeuvre());
		$oeuvre->setArtistes($artistes);
	}


	echo $callback . '('.json_encode($oeuvres).')';

});