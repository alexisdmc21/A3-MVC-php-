<?php
  class Autor{
    private $id;
    private $nombre;
    private $apellido;
    private $nacionalidad;
    private $fechaNacimiento;

    //constructor

    public function __construct($nombre=null, $apellido=null, $nacionalidad=null, $fechaNacimiento=null){
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->nacionalidad = $nacionalidad;
      $this->fechaNacimiento = $fechaNacimiento;
    }

    //get y set
    public function getId(){
      return $this->id;
    }

    public function setId($id){
      $this->id =$id;
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function setNombre($nombre){
      $this->nombre =$nombre;
    }


    public function getApellido(){
      return $this->apellido;
    }

    public function setApellido($apellido){
      $this->apellido =$apellido;
    }

    public function getNacionalidad(){
      return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad){
      $this->nacionalidad =$nacionalidad;
    }

    public function getFechaNacimiento(){
      return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento){
      $this->fechaNacimiento =$fechaNacimiento;
    }
  }
?>