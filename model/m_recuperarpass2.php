<?php
require_once("../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
require_once('Usuarios.php');
/**
 *
 */
  class Recuperar  {

    // Propiedades 
    private $email;
    public $objetoBuscar;
    private $mail;

    // Método Constructor
    public function __construct($email=null) {
      $this->objetoBuscar=new Usuarios();
      $this->mail = new PHPMailer();
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
      
      if ($this->email!="") {
        if ($resultado['email'] == $this->email) {
          $this->mail->SMTPDebug = 4;

          $this->mail->SMTPAuth = false;

          $this->mail->Port = 25;

          $this->mail->SetFrom('jmgonzalez@comvive.es','Administrador Web');

          $this->mail->AddReplyTo('jmgonzalez@comvive.es','Administrador Web');

          //$address = "jmgonzalez@comvive.es";
          //$address = "juanmita1982@gmail.com";          
          $address = $this->email;

          $this->mail->AddAddress($address, "Usuario", $resultado['name']);

          $this->mail->Subject = "Recuperar Password";

          $mensaje = "Su nueva password es: " . $psswd;        
          $mensaje .= " Recuerde modificarla";

          $this->mail->Body = $mensaje;

          $this->mail->charSet = "UTF8";
          
          if ($this->mail->Send()) {
         
            echo "Mensaje enviado.";
            $passwd=password_hash($psswd, PASSWORD_DEFAULT, array("cost"=>12));
            $contra=$this->objetoBuscar->updatePass($passwd,$this->email);
            if(!$contra){
              echo "Error en Contraseña";
            }
          }else{
            echo "Error al envviar el mensaje" . $this->mail->ErrorInfo;
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
