<?php
session_start();
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

// Clase Verificar
class Modificar {
  public $username;
  public $password;
  public $email;
  public $name;
  public $surname;
  public $birthday;
  public $address;
  public $postal;
  public $town;
  public $province;
  public $mobile;
  public $telephone;
  private $error;

  // Constructor
  public function __construct(){
    $this->username=$_POST['username'];
    $this->password = $_POST['password'];
    $this->email=$_POST['email'];
    $this->name=$_POST['name'];
    $this->surname=$_POST['surname'];
    $this->birthday=$_POST['birthday'];
    $this->address=$_POST['address'];
    $this->postal=$_POST['postal'];
    $this->town=$_POST['town'];
    $this->province=$_POST['province'];
    $this->mobile=$_POST['mobile'];
    $this->telephone=$_POST['telephone'];
    $this->error="";
  } // Fin Constructor


  // Método comprobar usuario
  public function checkModificar(){
    $user=new Usuarios($_SESSION['idUsuario']);
    //$user=new Usuarios(1);
    $resultado=$user->buscarUsuario($this->username,$this->password,$this->email);
    if($resultado==0){
      $user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
      $this->mobile,$this->telephone);
    } else {
        echo $this->getError();
        //header('location:http://jmgonzalez.com/proyecto_curri4/view/v_modificarUsuario.php');
        //echo "El nombre y/o email ya están siendo usados";
    }
  } // Fin método comprobar usuario

  // Método devolver error
  public function getError(){
    return $this->error="El nombre y/o email ya están siendo usados";
  } // Fin método

} // Fin clase Verificar
?>
