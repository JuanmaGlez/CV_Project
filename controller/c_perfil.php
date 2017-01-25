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
    if ($arraybuscar['desactivado'] == 0) {
      if ($this->contrasena == $arraybuscar['password']) {
        $_SESSION['idUsuario']=$this->objUser->getIdUsuario();
        $_SESSION['idTipoUsuario']=$this->objUser->getIdTipos();
        $_SESSION['loggedin'] = true;
        $_SESSION['username']=$this->usuario;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
        echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
      } else {
          echo "Usuario o Contraseña son incorrectos.";
          //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
      } // ** Fin IF **
    } else {
        echo "Este usuario esta desactivado";
    } // ** Fin IF **
  } //*** Fin método checkLogin()***

  public function checkConexion(){
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
      echo "Solo usuarios registrados.<br>";
      echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
    }

    $ahora = time();

    if ($ahora > $_SESSION['expire']) {
      session_destroy();
      echo "Su sesión ha terminado. <a href='../view/v_login.php'>Volver a Entrar</a>";
      //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
      exit;
    }
  }

  public function listar(){
    $row_lista=$this->objUser->listarUsuario();
    //$fila=$this->objUser->listarUsuario();
    while ($fila=$row_lista->fetch_array()) {
      if ($fila['idUsuario'] != 1){
        echo '<option value="'.$fila['username'].'">'.$fila['username']. '</option>';
        //echo '<option value="'.$fila.'">'.$fila. '</option>';
      }
    }
  }

  public function mostrar($nombre){
    $datosRecuperados=$this->objUser->mostrarUsuario($nombre);
    if ($datosRecuperados['desactivado'] == 0) {
      $datos='Activado';
    } else {
      $datos='Desactivado';
    }
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
    . " " . $datosRecuperados['idTipoUsuario'] . " " . $datos;
  }

  public function desactivo($valor,$nombre){
    $desactivo=$this->objUser->desactivarCuenta($valor,$nombre);
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
