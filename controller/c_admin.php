<?php
session_start();
require_once('../model/Usuarios.php');
/**
 *
 */
class Admin
{

  public function __construct() {
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

  public function mostrar($nombre){
    $datosRecuperados=$this->objUser2->mostrarUsuario($nombre);
    if ($datosRecuperados['desactivado'] == 0) {
      $datos='Activado';
    } else {
      $datos='Desactivado';
    }
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
    . " " . $datosRecuperados['idTipoUsuario'] . " " . $datos;
  } /***FIN MÉTODO mostrar() ***/

  public function desactivar($valor,$nombre){
    $desactivo=$this->objUser2->desactivarCuenta($valor,$nombre);
  } /***FIN MÉTODO desactivar() ***/

} /***FIN CLASE Admin ***/
 ?>
