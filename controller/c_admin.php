<?php
session_start();
require_once('../model/Usuarios.php');
/**
 *
 */
class Admin
{
  public $objUser2;
  private $nombre;
  private $idUsuario;
  private $username;

  public function __construct($nombre) {
    $this->nombre=$nombre;
    //$this->idUsuario="";
    $this->username=$nombre;
//    echo "constructor " . $this->username . "<br>";
    $this->objUser2=new Usuarios();
  }

  public function listar(){
    $row_lista=$this->objUser2->listarUsuario();
    //$fila=$this->objUser->listarUsuario();
    while ($fila=$row_lista->fetch_array()) {
      if ($fila['idUsuario'] != 1){
        echo '<option value="'.$fila['username'].'">'.$fila['username']. '</option>';
        //echo '<option value="'.$fila.'">'.$fila. '</option>';
      }
    }
  } /***FIN MÉTODO listar() ***/

  public function mostrar($nombre2){    
    if ($nombre2 != '0') {
      $datosRecuperados=$this->objUser2->mostrarUsuario($nombre2);
      if ($datosRecuperados['desactivado'] == 0) {
        $datos='Activado';
        $_ENV['reves']='Desactivar';
      } else {
        $datos='Desactivado';
        $_ENV['reves']='Activar';
      }
    $this->username=$datosRecuperados['username'];
    //echo $datosRecuperados['username'] . "<br>";
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
    . " " . $datosRecuperados['idTipoUsuario'] . " " . $datos;
    echo "<br>";
  }
  } /***FIN MÉTODO mostrar() ***/

  public function desactivar($valor,$nombre2){
    echo "desactivar " . $nombre2 . "<br>";
    $desactivo=$this->objUser2->desactivarCuenta($valor,$nombre2);
  } /***FIN MÉTODO desactivar() ***/

  public function activar($valor,$nombre2){
    echo "activar " . $nombre2 . "<br>";
    $activar=$this->objUser2->activarCuenta($valor,$nombre2);
  } /***FIN MÉTODO activar() ***/

} /***FIN CLASE Admin ***/
 ?>
