<?php

class LibroEntity{

    private $id_libro;
    private $titulo;
    private $anio_publicacion;
    private $id_autor;
    private $created_at;
    private $updated_at;

    public function __construct($titulo, $anio_publicacion){
        $this->titulo = $titulo;
        $this->anio_publicacion = $anio_publicacion;

    }
    public function getIdLibro() {
		return $this->id_libro;
	}

	public function setIdLibro($value) {
		$this->id_libro = $value;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function setTitulo($value) {
		$this->getTitulo = $value;
	}

	public function getAnio() {
		return $this->anio_publicacion;
	}

	public function setAnio($value) {
		$this->anio_publicacion = $value;
	}

	public function getIdAutor() {
		return $this->id_autor;
	}

	public function setIdAutor($value) {
		$this->id_autor = $value;
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
?>