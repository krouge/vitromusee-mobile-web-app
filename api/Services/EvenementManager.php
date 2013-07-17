<?php

/**
* 
*/
class EvenementManager{
	
	private $core;
	
	function __construct(){
		$this->core = Core::getInstance();
	}

	public function getByDate($annee, $mois){

		$jour_fin = 0;

		if (!($this->is_bisextile($annee))) {

			$anneeNormal = array(
				'01' => 31,
				'02' => 28,
				'03' => 30,
				'04' => 31,
				'05' => 30,
				'06' => 31,
				'07' => 30,
				'08' => 31,
				'09' => 30,
				'10' => 31,
				'11' => 30,
				'12' => 31,
		    );	

			foreach ($anneeNormal as $key => $value) {

				if($key == $mois){
					$jour_fin = $value;
					break;
				}
			}

		}else{

			$anneeBisextile = array(
				'01' => 31,
				'02' => 29,
				'03' => 30,
				'04' => 31,
				'05' => 30,
				'06' => 31,
				'07' => 30,
				'08' => 31,
				'09' => 30,
				'10' => 31,
				'11' => 30,
				'12' => 31,
		    );	

		    foreach ($anneeBisextile as $key => $value) {

				if($key == $mois){
					$jour_fin = $value;
					break;
				}
			}
		}

		$date_debut = "'$annee-$mois-01'";
		$date_fin = "'$annee-$mois-$jour_fin'";

		$sql= "SELECT Evenement.id, Evenement.nom, Evenement.description, Evenement.thumb, 
				DAY(date_debut) AS jour_debut, MONTH(date_debut) AS mois_debut, YEAR(date_debut) AS annee_debut,
				DAY(date_fin) AS jour_fin, MONTH(date_fin) AS mois_fin, YEAR(date_fin) AS annee_fin
				FROM Evenement 
				INNER JOIN TypeEvenement ON TypeEvenement.id = Evenement.TypeEvenement_id 
				WHERE Evenement.date_debut <=".$date_fin." AND Evenement.date_fin >=".$date_debut;

		$stmt = $this->core->dbh->prepare($sql);

		// $stmt->bindParam(':date_debut', $date_debut, PDO::PARAM_STR);
		// $stmt->bindParam(':date_fin', $date_debut, PDO::PARAM_STR);

		$result = array();
		$evenements = array();

		if ($stmt->execute()) {

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $key) {

				$evenement = new Evenement();

				$evenement->setIdEvenement($key['id']);
				$evenement->setNom($key['nom']);

				$datesDebut = $evenement->getDateDebut();
				$datesDebut[0] = $key['jour_debut'];
				$datesDebut[1] = $key['mois_debut'];
				$datesDebut[2] = $key['annee_debut'];
				$evenement->setDateDebut($datesDebut);
				print_r($datesDebut);
				$datesFin = $evenement->getDateFin();
				$datesFin[0] = $key['jour_fin'];
				$datesFin[1] = $key['mois_fin'];
				$datesFin[2] = $key['annee_fin'];
				$evenement->setDateFin($datesFin);

				$evenement->setDescription($key['description']);
				$evenement->setThumb($key['thumb']);

				array_push($evenements, $evenement);
			}

		} else {
			$result = 0;
		}		
			echo "<pre>";
				print_r($evenements);
			echo "</pre>";

		return $evenements;
	}


	public function is_bisextile($annee) {
	    if((($annee%4==0) && ($annee%100!=0)) || $annee%400==0) {
	        return true;
	    }
	    return false;
    }

}