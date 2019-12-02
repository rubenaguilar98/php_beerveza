<?php

	class Usuario
	{
		private $idUsu ;
		private $email ;
		private $nombre ;
		private $apellidos ;
		private $fec_nacimiento ;
		private $foto ;
		private $es_admin ;
		public function __construct() { 

		}

	    public function getIdUsu(){
	        return $this->idUsu;
		}
		
	    public function setIdUsu($idUsu){
	        $this->idUsu = $idUsu;

	        return $this;
	    }

	    public function getEmail(){
	        return $this->email;
	    }

	    public function setEmail($email){
	        $this->email = $email;

	        return $this;
	    }

	    public function getNombre(){
	        return $this->nombre;
	    }

	    public function setNombre($nombre){
	        $this->nombre = $nombre;

	        return $this;
	    }

	    public function getApellidos(){
	        return $this->apellidos;
	    }

	    public function setApellidos($apellidos){
	        $this->apellidos = $apellidos;

	        return $this;
	    }

	    public function getFecNacimiento(){
	        return $this->fec_nacimiento;
	    }

	    public function setFecNacimiento($fec_nacimiento){
	        $this->fec_nacimiento = $fec_nacimiento;

	        return $this;
	    }

	    public function getFoto(){
	        return $this->foto;
	    }

	    public function setFoto($foto){
	        $this->foto = $foto;

	        return $this;
	    }

	    public function getEsAdmin(){
	        return $this->es_admin;
	    }

	    public function setEsAdmin($es_admin){
	        $this->es_admin = $es_admin;

	        return $this;
		}
		
		public function getUsuario(){
	    	return $this->idUsu." ".$this->nombre." ".$this->apellidos." ".$this->email." ".$this->fec_nacimiento;
	    }

	    public function __toString(){
	    	return $this->idUsu." ".$this->nombre." ".$this->apellidos." ".$this->email." ".$this->fec_nacimiento;
	    }
	}
	