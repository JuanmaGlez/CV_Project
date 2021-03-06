<?php
require_once('Usuarios.php');
/**
 *
 */
  class Recuperar  {

    // Propiedades 
    private $email;
    public $objetoBuscar;

    // Método Constructor
    public function __construct($email=null) {
      $this->objetoBuscar=new Usuarios();
      if ($_POST['correo'] != ""){
        $this->email=$email;
      }
    } // Fin del método Constructor

    public function vacio(){
      echo $this->email;
    }

    public function enviado() {
      $resultado=$this->objetoBuscar->buscarEmail($this->email);
      $logitud = 10;
      $psswd = substr( md5(microtime()), 1, $logitud);
      //echo $psswd;
      if ($this->email!="") {
        if ($resultado['email'] == $this->email) {
          // Mensaje
          //$mensaje = "Link para poder recuperar su password \"http://jmgonzalez.com\"";
          $mensaje = "Su nueva password es: " . $psswd;        
          $mensaje .= " Recuerde modificarla";
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
            echo "Mensaje enviado.";
            $passwd=password_hash($psswd, PASSWORD_DEFAULT, array("cost"=>12));
            $contra=$this->objetoBuscar->updatePass($passwd,$this->email);
            if(!$contra){
              echo "Error en Contraseña";
            }
          }else{
            echo "Mensaje no enviado";
          }
        } else {
          echo "El email introducido no está en la base de datos";
        }
      } else {
        echo "No ha introducido el email";
      }
    } /**FIN MÉTODO enviado**/
   

  } // Fin de la Clase Recuperar
 ?>
