<?php
  /**
   *
   */
  class Profesional {
    private $idProfesional;
    private $occupation;
    private $start;
    private $end;
    private $company;
    private $description;

    public function __construct() {

    }

    public function getIdProfesional(){
      return $this->idProfesional;
    }

    public function getOccupation(){
      return $this->occupation;
    }

    public function getStart(){
      return $this->start;
    }

    public function getEnd(){
      return $this->end;
    }

    public function getCompany(){
      return $this->company;
    }

    public function getDescription(){
      return $this->description;
    }

    public function buscarProfesion($puesto){
      $sql="SELECT * FROM profesional where occupation = '$puesto'";
    }

    public function addProfesion($occupation,$start,$end,$company,$description){
      $sql="INSERT INTO profesional (`occupation`,`start`,`end`,`company`,`description`) values
      ('$occupation','$start','$end','$company','$description')";
    }

    public function setProfesion(){
      //$sql="UPDATE profesional SET username = '$username' WHERE idUsuario ='$this->idUsuario'";

    }

    public function dropProfesion(){

    }

  } // **FIN CLASE Profesional**
 ?>
