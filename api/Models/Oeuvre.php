<?php

/**
* 
*/
class Oeuvre implements JsonSerializable{
	
	private $idOeuvre;
	private $nom;
	private $date;
	private $description;
	private $media;
	private $thumb;
	private $artistes;

	function __construct()
	{

	}

	public function getIdOeuvre()
	{
	    return $this->idOeuvre;
	}
	
	public function setIdOeuvre($idOeuvre)
	{
	    $this->idOeuvre = $idOeuvre;
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

	public function getDate()
	{
	    return $this->date;
	}
	
	public function setDate($date)
	{
	    $this->date = $date;
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

	public function getMedia(){
		return $this->media;
	}

	public function setMedia($media){
		$this->media = $media;
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

	public function getArtistes()
	{
	    return $this->artistes;
	}
	
	public function setArtistes($artistes)
	{
	    $this->artistes = $artistes;
	    return $this;
	}
	


	
	
	public function jsonSerialize(){
		
        return [

            'idOeuvre' => $this->idOeuvre,
            'nom' => $this->nom,
            'date' => $this->date,
            'thumb' => $this->thumb,
            'description' => $this->description,
            'media' => $this->media, 
            'artistes' => $this->artistes,           
        ];
    }
	
}