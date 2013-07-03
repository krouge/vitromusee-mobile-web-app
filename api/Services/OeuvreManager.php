<?php

/**
* 
*/
class OeuvreManager 
{
	
	private $core;
	
	function __construct(){
		$this->core = Core::getInstance();
	}

	public function create(){



	}

	public function getAll(){

		$result = array();
		$oeuvres = array();	
		
		$sql = "SELECT * FROM Oeuvre";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				$oeuvre = new Oeuvre();

				$oeuvre->setIdOeuvre($key['id']);
				$oeuvre->setNom($key['nom']);
				$oeuvre->setDate($key['date']);
				$oeuvre->setDescription($key['description']);
				$oeuvre->setThumb($key['thumb']);

				array_push($oeuvres, $oeuvre);
			}

		} else {
			$result = null;
		}		

		return $oeuvres;

	}

	public function getById($id){

		$result = array();

		$sql = "SELECT * FROM Oeuvre WHERE id = :id";

		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		$oeuvre = new Oeuvre();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$oeuvre->setIdOeuvre($result[0]['id']);
			$oeuvre->setNom($result[0]['nom']);
			$oeuvre->setDate($result[0]['date']);
			$oeuvre->setDescription($result[0]['description']);
			$oeuvre->setThumb($result[0]['thumb']);

			
		} else {
			$result = 0;
		}		
		return $oeuvre;
	}


	public function update(){

	}

	public function delete(){

	}


}