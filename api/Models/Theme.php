<?php

/**
*
*/
class Theme implements JsonSerializable{

	private $idTheme;
	private $nom;
	private $description;
	private $oeuvres;

	function __construct(){
		
	}


	public function getIdTheme()
	{
	    return $this->idTheme;
	}
	
	public function setIdTheme($idTheme)
	{
	    $this->idTheme = $idTheme;
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

	public function getDescription()
	{
	    return $this->description;
	}
	
	public function setDescription($description)
	{
	    $this->description = $description;
	    return $this;
	}

	public function getOeuvres()
	{
	    return $this->oeuvres;
	}
	
	public function setOeuvres($oeuvres)
	{
	    $this->oeuvres = $oeuvres;
	    return $this;
	}
	

	public function jsonSerialize(){
		
        return [
            'idTheme' => $this->idTheme,
            'nom' => $this->nom,
            'description' => $this->description,
            'oeuvres' => $this->oeuvres
        ];
    }
	
}
	