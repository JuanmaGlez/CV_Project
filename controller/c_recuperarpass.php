<?php
//require_once
/**
 *
 */
class Prueba
{
  public $email;

  function __construct($email=null) {
    if ($_POST['correo'] == ""){
      $this->email="Esta vacio";
    } else {
      $this->email=$_POST['correo'];
    }
  }

  public function vacio(){
    echo $this->email;
  }
}

 ?>
