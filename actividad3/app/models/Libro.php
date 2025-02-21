<?php
  class Libro{
    private $id;
    private $titulo;
    private $anio_publicacion;
    private $genero;
    private $isbn;
    private $precio;
    private $cantidad;
    private $autores_id;

    public function __construct($titulo=null,$anio_publicacion=null,$genero=null,$isbn=null,$precio=null,$cantidad=null,$autores_id=null){
        $this->titulo = $titulo;
        $this->anio_publicacion = $anio_publicacion;
        $this->genero = $genero;
        $this->isbn = $isbn;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->autores_id = $autores_id; 
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAnioPublicacion(){
        return $this->anio_publicacion;
    }

    public function setAnioPublicacion($anio_publicacion){
        $this->anio_publicacion = $anio_publicacion;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function getAutoresId(){
        return $this->autores_id;
    }

    public function setAutoresId($autores_id){
        $this->autores_id = $autores_id;
    }     
  }

?>