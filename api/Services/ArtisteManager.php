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

	public function getAll(){

		$result = array();
		$artistes = array();	
		
		$sql = "SELECT * FROM Artiste ORDER BY nom";
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

				$artiste->setNationalite($key['nationalite']);
				$artiste->setActivite($key['activite']);
				$artiste->setFormation($key['formation']);
				$artiste->setStyle($key['style']);
				$artiste->setBiographie($key['biographie']);
				$artiste->setThumb($key['thumb']);

				array_push($artistes, $artiste);
			}

		} else {
			$result = null;
		}		
		return $artistes;

	}

	public function getById($id){

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
			$artiste->setNationalite($result[0]['nationalite']);
			$artiste->setActivite($result[0]['activite']);
			$artiste->setFormation($result[0]['formation']);
			$artiste->setStyle($result[0]['style']);
			$artiste->setBiographie($result[0]['biographie']);
			$artiste->setThumb($result[0]['thumb']);

		} else {
			$result = 0;
		}		
		return $artiste;
	}

	public function update(){

	}

	public function delete(){

	}

	public function getArtistesByOeuvre($idOeuvre){

		$result	= array();
		$sql = "SELECT Artiste_id FROM Oeuvre_Artiste WHERE Oeuvre_id = :idOeuvre";

		$stmt = $this->core->dbh->prepare($sql);

		$stmt->bindParam(':idOeuvre', $idOeuvre, PDO::PARAM_INT);

		$artistes = array();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				
				$artiste = $this->getById($key['Artiste_id']);
				// $oeuvre = $this->oeuvreManager->getById($key['Oeuvre_id']);

				// $merge = array($artiste,$oeuvre);

				array_push($artistes, $artiste);

			}
			
		} else {
			$result = 0;
		}
		return $artistes;

	}


}