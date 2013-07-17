<?php

/**
* 
*/
class Evenement implements JsonSerializable
{
	private $idEvenement;
	private $nom;
	private $type;

	private $dateDebut;
	private $dateFin;
	
	private $description;
	private $thumb;

	function __construct(){

		// A modifier -> sous requete SQL pour obtenir le contenu de la table TypeEvenement
		$this->type = "A Changer Exposition temporaire A changer";

		$jour_debut = 0;
		$mois_debut = 0;
		$annee_debut = 0;
		$this->dateDebut = array('jour'=>$jour_debut, 'mois'=>$mois_debut, 'annee'=>$annee_debut);

		$jour_fin = 0;
		$mois_fin = 0;
		$annee_fin = 0;
		$this->dateFin = array('jour'=>$jour_fin, 'mois'=>$mois_fin, 'annee'=>$annee_fin);
	}


	public function getIdEvenement()
	{
	    return $this->idEvenement;
	}
	
	public function setIdEvenement($idEvenement)
	{
	    $this->idEvenement = $idEvenement;
	    return $this;
	}
	

	public function getNom()
	{
	    return $this->nom;
	}
	
	public function setNom($nom)
	{
	    $this->nom = $nom;
	    return $this;
	}


	public function getType()
	{
	    return $this->type;
	}
	
	public function setType($type)
	{
	    $this->type = $type;
	    return $this;
	}
	
	public function getDateDebut()
	{
	    return $this->dateDebut;
	}
	
	public function setDateDebut($dateDebut)
	{
	    $this->dateDebut = $dateDebut;
	    return $this;
	}
	

	public function getDateFin()
	{
	    return $this->dateFin;
	}
	
	public function setDateFin($dateFin)
	{
	    $this->dateFin = $dateFin;
	    return $this;
	}


	public function getDescription()
	{
	    return $this->description;
	}
	
	public function setDescription($description)
	{
	    $this->description = $description;
	    return $this;
	}
	
	
	public function getThumb()
	{
	    return $this->thumb;
	}
	
	public function setThumb($thumb)
	{
	    $this->thumb = $thumb;
	    return $this;
	}
	
	public function jsonSerialize(){
		
        return [

            'idEvenement' => $this->idEvenement,
            'nom' => $this->nom,
            'type' => $this->type,
            'dateDebut' => $this->dateDebut,
            'dateFin' => $this->dateFin,
            'description' => $this->description,
            'thumb' => $this->thumb
        ];
    }
	
	
}