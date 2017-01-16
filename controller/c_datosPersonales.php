<?php
session_start();
//require_once("../../model/Usuarios.php");
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

class DatosPersonales{
  public $idUsuario;
  public $objUsuario;

  public function __construct($idUsuario){
    echo "Clase Datos Personales. Constructor1 " . $this->conectarse->login . $this->conectarse->contrasena . "<br>";
    $this->objUsuario=new Usuarios($idUsuario);
    echo "Clase Datos Personales. Constructor2 " . $this->conectarse->login . $this->conectarse->contrasena . "<br>";
  }

  public function mostrarDatosPersonales(){
  //  echo $this->objUsuario->getIdUsuario() . "<br>";
    echo $this->objUsuario->getUsername() . "<br>";
    echo $this->objUsuario->getPassword() . "<br>";
    echo $this->objUsuario->getEmail() . "<br>";
    echo $this->objUsuario->getName() . " " . $this->objUsuario->getSurname() . "<br>";
    echo $this->objUsuario->getBirthday() . "<br>";
    echo $this->objUsuario->getAddress() . "<br>";
    echo $this->objUsuario->getPostal() . "<br>";
    echo $this->objUsuario->getTown() . "<br>";
    echo $this->objUsuario->getProvince() . "<br>";
    echo $this->objUsuario->getMobile() . "<br>";
    echo $this->objUsuario->getTelephone() . "<br>";
  }
}


 ?>
