<?php

/**
* Class à Delete
*/
class ArtisteOeuvreManager
{

	private $core;
	private $artisteManager;
	private $oeuvreManager;
	
	function __construct()
	{
		$this->core = Core::getInstance();
		$this->artisteManager = new ArtisteManager();
		$this->oeuvreManager = new OeuvreManager();
	}

	public function getOeuvre(){
		$result = $this->oeuvreManager->getAll();
			
		foreach ($result as $oeuvre) {

			$artistes = $this->getAllOeuvreByArtiste($oeuvre->getIdOeuvre());
			$oeuvre->setArtistes($artistes);
		}
			
		return $result;
		
	}


	public function getAllOeuvreByArtiste($idOeuvre){

		$result	= array();
		$sql = "SELECT Artiste_id FROM Oeuvre_Artiste WHERE Oeuvre_id = :idOeuvre";

		$stmt = $this->core->dbh->prepare($sql);

		$stmt->bindParam(':idOeuvre', $idOeuvre, PDO::PARAM_INT);

		$artistes = array();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				
				$artiste = $this->artisteManager->getById($key['Artiste_id']);
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