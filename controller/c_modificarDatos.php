<?php
session_start();
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

// Clase Modificar
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
  public $user;


  // Constructor
  public function __construct(){
    $this->user=new Usuarios($_SESSION['idUsuario']);
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
  } // Fin Constructor


  // Método comprobar usuario
  public function checkModificar(){
    $resultado=$this->user->buscarUsuario($this->username,$this->password);
    if($resultado['email']!=$this->email){
      $this->user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
      $this->mobile,$this->telephone);
    } else {
        echo "El nombre y/o email ya están siendo usados";
    }
  } // Fin método comprobar usuario



} // Fin clase Modificar
?>
