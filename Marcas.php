<?php

	class Marcas{

		private $CodMarca ;
		private $NomMarca ;
		private $CodPais ;
		private $ImgMarca ;

		public function __construct() { 

		}

	    public function getCodMarca(){
	        return $this->CodMarca;
		}
		
	    public function setCodMarca($CodMarca){
	        $this->CodMarca = $CosMarca;

	        return $this;
	    }

	    public function getNomMarca(){
	        return $this->NomMarca;
	    }

	    public function setNomMarca($NomMarca){
	        $this->NomMarca = $NomMarca;

	        return $this;
        }
        
        public function getCodPais(){
	        return $this->CodPais;
		}
		
		public function getImgMarca(){
	        return $this->imgMarca;
	    }

	    public function setImgTipo($imgMarca){
	        $this->imgTipo = $imgMarca;

	        return $this;
		}

	    public function __toString(){
	    	return $this->CodMarca." ".$this->NomMarca ;
	    }
	}