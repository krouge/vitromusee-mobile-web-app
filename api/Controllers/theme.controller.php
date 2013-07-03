<?php

$app->get('/themes', function () use ($app) {	

	$callback = $app->request()->params('jsonp_callback');

	$themeManager = new ThemeManager ();
	$themes = $themeManager->read();

	 echo $callback . '('.json_encode($themes).')';

});