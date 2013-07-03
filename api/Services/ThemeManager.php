<?php

/**
* 
*/
class ThemeManager{ 

	private $core;
	
	function __construct(){
		$this->core = Core::getInstance();
	}

	public function getAll(){

		$result = array();
		$themes = array();	
		
		$sql = "SELECT * FROM Theme";
		$stmt = $this->core->dbh->prepare($sql);

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				$theme = new Theme();
				$theme->setIdTheme($key['id']);
				$theme->setNom($key['nom']);
				$theme->setDescription($key['description']);

				array_push($themes, $theme);
			}

		} else {
			$result = null;
		}		

		return $themes;

	}

	public function getById($id){

		$result = array();

		$sql = "SELECT * FROM Theme WHERE id = :id";

		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		$themes = array();

		if ($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key => $value) {

				$theme = new Theme();

				$theme->setIdMedia($value['id']);
				$media->setNom($value['nom']);
				$media->setSource($value['source']);
				$media->setExtension($value['extension']);
				$media->setDescription($value['description']);

				array_push($themes, $theme);

			}
		} else {
			$result = 0;
		}		
		return $themes;
	}
}
