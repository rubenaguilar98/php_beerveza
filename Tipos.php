<?php

	class Tipos{

		private $CodTipo ;
        private $NomTipo ;
        private $Graduacion;
        private $Composicion;
        private $Capacidad;
		private $CodMarca ;
		private $imgTipo;

		public function __construct() { 

		}

	    public function getCodTipo(){
	        return $this->CodTipo;
		}
		
	    public function setCodTipo($CodTipo){
	        $this->CodTipo = $CosTipo;

	        return $this;
	    }

	    public function getNomTipo(){
	        return $this->NomTipo;
	    }

	    public function setNomTipo($NomTipo){
	        $this->NomTipo = $NomTipo;

	        return $this;
        }
        
        public function getGraduacion(){
	        return $this->Graduacion;
	    }

	    public function setGraduacion($Graduacion){
	        $this->Graduacion = $Graduacion;

	        return $this;
        }
        
        public function getComposicion(){
	        return $this->Composicion;
	    }

	    public function setComposicion($Composicion){
	        $this->Composicion = $Composicion;

	        return $this;
        }
        
        public function getCapacidad(){
	        return $this->Capacidad;
	    }

	    public function setCapacidad($Capacidad){
	        $this->Capacidad = $Capacidad;

	        return $this;
		}
		
        public function getMarca(){
	        return $this->CodMarca;
		}
		
		public function getImgTipo(){
	        return $this->imgTipo;
	    }

	    public function setImgTipo($imgTipo){
	        $this->imgTipo = $imgTipo;

	        return $this;
		}

	    public function __toString(){
	    	return $this->CodTipo." ".$this->NomTipo ;
	    }
	}