<?php
session_start();
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/CV_Project/model/Usuarios.php");

// Clase Modificar
class Modificar {
  private $username;
  private $password;
  private $email;
  private $name;
  private $surname;
  private $birthday;
  private $address;
  private $postal;
  private $town;
  private $province;
  private $mobile;
  private $telephone;
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
    $valor=$this->user->buscarEmail($this->email);
    echo $resultado['email'] . " " .  $resultado['username'] . " " . $this->email . " " . $this->username . "<br>";
    if($resultado['email']==$this->email && $resultado['username']==$this->username){
      echo "1";
      $this->user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
      $this->mobile,$this->telephone);
    }
    if ($resultado['email']!=$this->email && $resultado['username']==$this->username){
      echo "2";
      if($valor['email']!=$this->email) {
        echo "3";
        $this->user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
        $this->mobile,$this->telephone);
      } else {
        echo "El email ya está siendo usado. 1";
      }
    }
    if ($resultado['email']==$this->email && $resultado['username']!=$this->username){
      echo "4";
      if($valor['username']!=$this->username) {
        echo "5";
        $this->user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
        $this->mobile,$this->telephone);
      } else {
        echo "El nombre ya está siendo usado. 1";
      }
    }
    if ($resultado['email']!=$this->email && $resultado['username']!=$this->username){
      echo "6";
        if($valor['email']!=$this->email){
          echo "7";
          if ($valor['username']!=$this->username) {
            echo "7";
            $this->user->setDatosPersonales($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
            $this->mobile,$this->telephone);
          } else {
            echo "El nombre ya está siendo usado. 2";
            }
        } else {
          echo "El email ya está siendo usado. 2";
          }
          //echo "El nombre y/o email ya están siendo usados";
      }
  } // Fin método comprobar usuario



} // Fin clase Modificar
?>
