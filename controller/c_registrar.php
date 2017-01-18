<?php
session_start();
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

// Clase Registrar
class Registrar {
  public $idUsuario;
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
  private $objuser;

  // Constructor
  public function __construct(){
    $this->objuser=new Usuarios();
    $this->arrayDatos= array($this->username=$_POST['username'],
    $this->password = $_POST['password'],
    $this->email=$_POST['email'],
    $this->name=$_POST['name'],
    $this->surname=$_POST['surname'],
    $this->birthday=$_POST['birthday'],
    $this->address=$_POST['address'],
    $this->postal=$_POST['postal'],
    $this->town=$_POST['town'],
    $this->province=$_POST['province'],
    $this->mobile=$_POST['mobile'],
    $this->telephone=$_POST['telephone']);

  } // Fin Constructor

  // Método comprobar usuario
  public function checkUsuario(){
    $resultado=$this->objuser->crearUsuario($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
      $this->mobile,$this->telephone=0);
      if($resultado==0){
      echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
    } else {
      echo "El usuario ya existe";
    }
  } // Fin método comprobar usuario


} // Fin clase Registrar
?>
