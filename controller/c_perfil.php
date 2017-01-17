<?php
/**
 *
 */
session_start();
require_once('../model/Usuarios.php');

class Perfil {
  private $usuario;
  private $contrasena;
  private $objUser;

  public function __construct($usuario,$contrasena) {
    $this->usuario=$usuario;
    $this->contrasena=$contrasena;
    $this->objUser=new Usuarios();
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
      echo "Usuario " . $_SESSION['username'] . "esta Conectado";
    } else {
      echo "Usuario o Contraseña son incorrectos.";
      require_once('/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/view/v_login.php');
      exit;
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

      echo "Su sesión ha terminado. <a href='/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/view/v_login.php'>
      Volver a Entrar</a>";
      exit;
    }
  }

  public function closeSession(){
    //echo "saliendo";
    unset ($_SESSION['username']);
    session_destroy();
    require_once('../view/v_login.php');
    exit;
  } //Fin método cerrar sesión

} //***Fin Clase Perfil***

 ?>
