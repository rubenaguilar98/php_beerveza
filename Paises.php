<?php

	class Paises{

		private $CodPais ;
		private $NomPais ;
		private $ImgPais;

		public function __construct() { 

		}

	    public function getCodPais(){
	        return $this->CodPais;
		}
		
	    public function setCodPais($CodPais){
	        $this->CodPais = $CosPais;

	        return $this;
	    }

	    public function getNomPais(){
	        return $this->NomPais;
	    }

	    public function setNomPais($NomPais){
	        $this->NomPais = $NomPais;

	        return $this;
		}
		
		public function getImgPais(){
	        return $this->imgPais;
	    }

	    public function __toString(){
	    	return $this->CodPais." ".$this->NomPais ;
	    }
	}
	