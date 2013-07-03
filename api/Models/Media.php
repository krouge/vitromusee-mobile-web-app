<?php

/**
* 
*/
class Media implements JsonSerializable{
	
	private $idMedia;
	private $nom;
	private $source;
	private $extension;
	private $description;

	function __construct(){

	}

	public function getIdMedia()
	{
	    return $this->idMedia;
	}
	
	public function setIdMedia($idMedia)
	{
	    $this->idMedia = $idMedia;
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
	
	public function getSource()
	{
	    return $this->source;
	}
	
	public function setSource($source)
	{
	    $this->source = $source;
	    return $this;
	}
	
	public function getExtension()
	{
	    return $this->extension;
	}
	
	public function setExtension($extension)
	{
	    $this->extension = $extension;
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

	public function jsonSerialize(){
		
        return [

            'idMedia' => $this->idMedia,
            'nom' => $this->nom,
            'source' => $this->source,
            'description' => $this->description,
            'extension' => $this->extension
        ];
    }

}