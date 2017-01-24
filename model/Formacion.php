<?php
  /**
   *
   */
  class Formacion {
    private $idFormation;
    private $formation;
    private $start;
    private $end;
    private $center;
    private $grades;

    public function __construct() {

    }

    public function getIdFormation(){
      return $this->idFormation;
    }

    public function getFormation(){
      return $this->formation;
    }

    public function getStart(){
      return $this->start;
    }

    public function getEnd(){
      return $this->end;
    }

    public function getCenter(){
      return $this->center;
    }

    public function getGrades(){
      return $this->grades;
    }

    public function buscarFormacion($formacion){
      $sql="SELECT * FROM formacion where formation = '$formacion'";
    }

    public function addFormacion($formation,$start,$end,$center,$grades){
      $sql="INSERT INTO formacion (`formation`,`start`,`end`,`center`,`grades`) values
      ('$formation','$start','$end','$center','$grades')";
    }

    public function setFormacion(){
      //$sql="UPDATE formacion SET username = '$username' WHERE idUsuario ='$this->idUsuario'";

    }

    public function dropFormacion(){

    }

  } // **FIN CLASE Formacion**
 ?>
