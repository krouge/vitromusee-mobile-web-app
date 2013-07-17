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

	private $nationalite;
	private $activite;
	private $formation;
	private $style;
	private $biographie;
	private $thumb;

	
	function __construct()
	{
		
	}	
	

	
	public function getNationalite()
	{
	    return $this->nationalite;
	}
	
	public function setNationalite($nationalite)
	{
	    $this->nationalite = $nationalite;
	    return $this;
	}
	

	public function getActivite()
	{
	    return $this->activite;
	}
	
	public function setActivite($activite)
	{
	    $this->activite = $activite;
	    return $this;
	}
	

		public function getFormation()
		{
		    return $this->formation;
		}
		
		public function setFormation($formation)
		{
		    $this->formation = $formation;
		    return $this;
		}


		public function getStyle()
		{
		    return $this->style;
		}
		
		public function setStyle($style)
		{
		    $this->style = $style;
		    return $this;
		}
		

		public function getBiographie()
		{
		    return $this->biographie;
		}
		
		public function setBiographie($biographie)
		{
		    $this->biographie = $biographie;
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
            'dateDeces' => $this->dateDeces,
            'nationalite' => $this->nationalite,
            'activite' => $this->activite,
            'style' => $this->style,
            'biographie' => $this->biographie,
            'thumb' => $this->thumb
            
        ];
    }

}