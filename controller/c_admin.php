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
    //$this->username="";
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
    $datosRecuperados=$this->objUser2->mostrarUsuario($nombre2);
    if ($datosRecuperados['desactivado'] == 0) {
      $datos='Activado';
    } else {
      $datos='Desactivado';
    }
    $this->idUsuario=$datosRecuperados['idUsuario'];
    $this->username=$datosRecuperados['username'];
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'];
    //echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
    //. " " . $datosRecuperados['idTipoUsuario'] . " " . $datos;
  } /***FIN MÉTODO mostrar() ***/

  public function desactivar($valor,$nombre2){
    echo "nombre " . $this->username;
    $desactivo=$this->objUser2->desactivarCuenta($valor,$nombre2);
  } /***FIN MÉTODO desactivar() ***/

} /***FIN CLASE Admin ***/
 ?>
