<?php
/**
 *
 */
session_start();
require_once('../model/Usuarios.php');

class Perfil {
  private $usuario;
  private $contrasena;
  public $objUser;

  public function __construct($usuario,$contrasena) {
    $this->usuario=$usuario;
    $this->contrasena=$contrasena;
    $this->objUser=new Usuarios($_SESSION['idUsuario']);
  } //***Fin Construtor***

  public function checkLogin(){
    $arraybuscar=$this->objUser->buscarUsuario($this->usuario,$this->contrasena);
    if ($this->contrasena == $arraybuscar['password']){
      $_SESSION['idUsuario']=$this->objUser->getIdUsuario();
      $_SESSION['idTipoUsuario']=$this->objUser->getIdTipos();
      $_SESSION['loggedin'] = true;
      $_SESSION['username']=$this->usuario;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (10 * 1);
      echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
    } else {
      //header("refresh:2;url=../view/v_login.php");
      echo "Usuario o Contraseña son incorrectos.";
      //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";      
    } // **Fin IF **

  } //***Fin método checkLogin()***

  public function checkConexion(){
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
      echo "Solo usuarios registrados.<br>";
      echo "<br><a href='/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/view/v_login.php'></a>";
    exit;
    }

    $ahora = time();

    if ($ahora > $_SESSION['expire']) {
      session_destroy();
      echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
      exit;
    }
  }

  public function mostrar(){
    echo $this->objUser->getUsername() . "<br>";
    echo $this->objUser->getPassword() . "<br>";
    echo $this->objUser->getEmail() . "<br>";
    echo $this->objUser->getName() . " " . $this->objUser->getSurname() . "<br>";
    echo $this->objUser->getBirthday() . "<br>";
    echo $this->objUser->getAddress() . "<br>";
    echo $this->objUser->getPostal() . "<br>";
    echo $this->objUser->getTown() . "<br>";
    echo $this->objUser->getProvince() . "<br>";
    echo $this->objUser->getMobile() . "<br>";
    echo $this->objUser->getTelephone() . "<br>";
  }

  public function closeSession(){
    //echo "saliendo";
    unset ($_SESSION['username']);
    session_destroy();
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
    exit;
  } //Fin método cerrar sesión

} //***Fin Clase Perfil***

 ?>
