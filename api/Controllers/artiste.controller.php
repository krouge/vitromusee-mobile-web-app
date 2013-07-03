<?php


$app->get('/artiste', function () use ($app) {	

	$artisteManager = new ArtisteManager ();
	$artistes = $artisteManager->read();

	echo json_encode($artistes);

});

$app->get('/artiste/:id', function ($id) use ($app) {

	$artisteManager = new ArtisteManager();
	$artiste = $artisteManager->readById($id);

	echo json_encode($artiste);


});

$app->post('/user', function () use ($app) {	
	//var_dump($app->request()->post('data'));
	$user = json_decode($app->request()->post('data'), true);	
	$user['password'] = hash("sha1", $user['password']);	
	$oUser = new User ();
	echo $oUser->insertUser($user);
});

// LOGIN GET user by email and passwordS
$app->post('/login', function () use ($app) {
	//var_dump($app->request()->post('data'));
	$data = json_decode($app->request()->post('data'), true);
	
	//echo $data['password'];
	$email = $data['email'];
	$pass = hash("sha1", $data['password']);
	//echo "  despues: ".$pass. "   ";

	$oUser = new User();
	
	echo json_encode($oUser->getUserByLogin($email, $pass), true);
});

// PUT route
$app->put('/user', function () {
	echo 'This is a PUT route';
});

// DELETE route
$app->delete('/user', function () {
    echo 'This is a DELETE route';
});