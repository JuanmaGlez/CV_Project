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
      $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
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

  public function listar(){
    $row_lista->listarUsuario();
    while ($fila=$row_lista->fetch_array()) {    
      echo '<option value="'.$fila['username'].'">'.$fila['username']. '</option>';
    }
  }

  public function mostrar($nombre){
    $datosRecuperados=$this->objUser->mostrarUsuario($nombre);
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
      . " " . $datosRecuperados['idTipoUsuario'];
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
