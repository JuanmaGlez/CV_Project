<?php
require_once('../model/Usuarios.php');
/**
 *
 */
class Prueba
{
  private $email;
  public $objBuscar;

  public function __construct($email=null) {
    $this->objBuscar=new Usuarios();
    if ($_POST['correo'] != ""){
      $this->email=$email;
    }
  }

  public function vacio(){
    echo $this->email;
  }

  public function enviado() {
    $resultado=$this->objBuscar->buscarEmail($this->email);
    if ($this->email!="") {
      if ($resultado['email'] == $this->email) {
        // Mensaje
        $mensaje = '
          <html>
          <head>
            <title>E-Mail</title>
          </head>
          <body>
            Link para poder recuperar su password
            <a href="http://www.webtaller.com">Ir a WebTaller</a>
          </body> ';
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
      } else {
        echo "El email introducido no está en la base de datos";
      }
    } else {
      echo "No ha introducido el email";
    }
  }

}
 ?>
