<?php

/**
* 
*/
class MediaManager 
{
	
	private $core;
	
	function __construct(){
		$this->core = Core::getInstance();
	}

	public function create(){

	}

	public function getById($id){

		$result = array();

		$sql = "SELECT * FROM Media WHERE Oeuvre_id = :id";

		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		$medias = array();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key => $value) {

				$media = new Media();

				$media->setIdMedia($value['id']);
				$media->setNom($value['nom']);
				$media->setSource($value['source']);
				$media->setExtension($value['extension']);
				$media->setDescription($value['description']);

				array_push($medias, $media);

			}
		} else {
			$result = 0;
		}		
		return $medias;
	}


	public function update(){

	}

	public function delete(){

	}


}