<?php

class AutorEntity{

    private $id_autor;
    private $nombre;
    private $apellido;
    private $nacionalidad;
    private $created_at;
    private $updated_at;

    public function __construct($nombre, $apellido, $nacionalidad=null){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nacionalidad = $nacionalidad;

    }

	public function getIdAutor() {
		return $this->id_autor;
	}

	public function setIdAutor($value) {
		$this->id_autor = $value;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($value) {
		$this->nombre = $value;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($value) {
		$this->apellido = $value;
	}

	public function getNacionalidad() {
		return $this->nacionalidad;
	}

	public function setNacionalidad($value) {
		$this->nacionalidad = $value;
	}

	public function getCreated_at() {
		return $this->created_at;
	}

	public function setCreated_at($value) {
		$this->created_at = $value;
	}

	public function getUpdated_at() {
		return $this->updated_at;
	}

	public function setUpdated_at($value) {
		$this->updated_at = $value;
	}
}