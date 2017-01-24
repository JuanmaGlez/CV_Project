<?php
//require_once
/**
 *
 */
class Prueba
{
  public $email;

  function __construct($email) {
    if ($email == ""){
      $this->email="Esta vacio";
    } else {
      $this->email=$_POST['correo'];
    }
  }

  public function vacio(){
    echo $this->email;
  }

  public function enviado() {
    // Mensaje
    $mensaje = "Link para poder recuperar su password";
    //Titulo
    $titulo = "Recuperar Password";
    //cabecera
  /*  $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //dirección del remitente
    $headers .= "From: Curriculum Web < jmgonzalez@comvive.es >\r\n";*/
    $cabeceras = 'From: jmgonzalez@comvive.es' . "\r\n" .
    'Reply-To: jmgonzalez@comvive.es' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //Enviamos el mensaje a tu_dirección_email
    $bool = mail($this->email,$titulo,$mensaje,$cabeceras);
    if($bool){
      echo "Mensaje enviado";
    }else{
      echo "Mensaje no enviado";
    }
  }

}
 ?>
