<?php

/**
* 
*/
class ArtisteManager 
{

	private $core;
	
	function __construct()
	{
		$this->core = Core::getInstance();
	}

	public function create(){

	}

	public function read(){

		$result = array();
		$artistes = array();	
		
		$sql = "SELECT * FROM Artiste";
		$stmt = $this->core->dbh->prepare($sql);
		//$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				$artiste = new Artiste();
				$artiste->setIdArtiste($key['id']);
				$artiste->setNom($key['nom']);
				$artiste->setPrenom($key['prenom']);
				$artiste->setPseudo($key['pseudonyme']);
				$artiste->setDateNaissance($key['date_naissance']);
				$artiste->setDateDeces($key['date_deces']);

				array_push($artistes, $artiste);
			}

		} else {
			$result = null;
		}		
		return $artistes;

	}

	public function readById($id){

		$result = array();

		$sql = "SELECT * FROM Artiste WHERE id = :id";

		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		$artiste = new Artiste();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


			$artiste->setIdArtiste($result[0]['id']);
			$artiste->setNom($result[0]['nom']);
			$artiste->setPrenom($result[0]['prenom']);
			$artiste->setPseudo($result[0]['pseudonyme']);
			$artiste->setDateNaissance($result[0]['date_naissance']);
			$artiste->setDateDeces($result[0]['date_deces']);

		} else {
			$result = 0;
		}		
		return $artiste;
	}

	public function update(){

	}

	public function delete(){

	}


}