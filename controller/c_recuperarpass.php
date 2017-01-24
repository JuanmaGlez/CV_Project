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

  public function enviado() {
    $mail = "Prueba de mensaje";
    //Titulo
    $titulo = "PRUEBA DE TITULO";
    //cabecera
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //dirección del remitente
    $headers .= "From: Curriculum Web < jmgonzalez@comvive.es >\r\n";
    //Enviamos el mensaje a tu_dirección_email
    $bool = mail($this->email,$titulo,$mail,$headers);
    if($bool){
      echo "Mensaje enviado";
    }else{
      echo "Mensaje no enviado";
    }
  }

}
 ?>
