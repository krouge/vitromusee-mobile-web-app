<?php

/**
* 
*/
class Artiste implements JsonSerializable
{

	private $idArtiste;
	private $nom;
	private $prenom;
	private $pseudo;
	private $dateNaissance;
	private $dateDeces;
	
	function __construct()
	{
		
	}	
	
	public function getIdArtiste()
	{
	    return $this->idArtiste;
	}
	
	public function setIdArtiste($idArtiste)
	{
	    $this->idArtiste = $idArtiste;
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

	public function getPrenom()
	{
	    return $this->prenom;
	}
	
	public function setPrenom($prenom)
	{
	    $this->prenom = $prenom;
	    return $this;
	}

	public function getPseudo()
	{
	    return $this->pseudo;
	}
	
	public function setPseudo($pseudo)
	{
	    $this->pseudo = $pseudo;
	    return $this;
	}

	public function getDateNaissance()
	{
	    return $this->dateNaissance;
	}

	public function setDateNaissance($dateNaissance)
	{
	    $this->dateNaissance = $dateNaissance;
	    return $this;
	}

	public function getDateDeces()
	{
	    return $this->dateDeces;
	}
	
	public function setDateDeces($dateDeces)
	{
	    $this->dateDeces = $dateDeces;
	    return $this;
	}

 	public function jsonSerialize()
 	{
        return [
            'idArtiste' => $this->idArtiste,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'pseudo' => $this->pseudo,
            'dateNaissance' => $this->dateNaissance,
            'dateDeces' => $this->dateDeces
        ];
    }

}