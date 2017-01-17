<?php
session_start();
require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

// Clase Verificar
class Verificar {
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
  private $error;
  private $objuser;

  // Constructor
  public function __construct(){
    $this->objuser=new Usuarios();
    $this->username=$_POST['username'];
    $this->password = $_POST['password'];
    $this->email=$_POST['email'];
    $this->name=$_POST['name'];
    $this->surname=$_POST['surname'];
    $this->birthday=$_POST['birthday'];;
    $this->address=$_POST['address'];;
    $this->postal=$_POST['postal'];;
    $this->town=$_POST['town'];;
    $this->province=$_POST['province'];;
    $this->mobile=$_POST['mobile'];;
    $this->telephone=$_POST['telephone'];;
    $this->error="";
  } // Fin Constructor

  // Método comprobar usuario
  public function checkUsuario(){
    $resultado=$this->objuser->buscarUsuario($this->username,$this->password,$this->email);
    if($resultado==0){
      //echo "Usuario creado";
      $objuser->crearUsuario($this->username,$this->password,$this->email,$this->name,$this->surname,$this->birthday,$this->address,$this->postal,$this->town,$this->province,
      $this->mobile,$this->telephone=0);
      //header('location:http://jmgonzalez.com/proyecto_curri4/view/v_login.php');
    } else {
      echo "El usuario ya existe";
    }
  } // Fin método comprobar usuario


  // Método comprobrar login
  public function checkLogin(){
    $resultado=$this->objuser->buscarUsuario($this->username,$this->password,$this->email);
    if ($this->password == $resultado['password']) {
      $_SESSION['loggedin'] = true;
      //$_SESSION['username'] = $this->username;
      //$_SESSION['username'] = $resultado['username'];
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (60 * 2);
      $_SESSION['idUsuario']=$this->objuser->getIdUsuario();
      $_SESSION['idTipoUsuario']=$this->objuser->getIdTipos();

      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      } else {
        echo "Solo usuarios registrados.<br>";
        //echo "<br><a href='login.php'></a>";
      exit;
      }

      $ahora = time();

      if ($ahora > $_SESSION['expire']) {
        session_destroy();

        header('location:http://jmgonzalez.com/proyecto_curri4/view/v_login.php');
        exit;
      }

    } else {
        header('location:http://jmgonzalez.com/proyecto_curri4/view/v_login.php');
        exit;
      }
  } // Fin método comprobrar login

  // Método cerrar sesión
  public function closeSession(){
    //echo "saliendo";
    unset ($_SESSION['username']);
    session_destroy();

    //header('location:http://jmgonzalez.com/proyecto_curri4/view/v_login.php');
  } //Fin método cerrar sesión
} // Fin clase Verificar
?>
