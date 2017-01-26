<?php
/**
 *
 */
class Admin
{

  public function __construct(argument)
  {
    # code...
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
  } /***FIN MÉTODO listar() ***/

  public function mostrar($nombre){
    $datosRecuperados=$this->objUser->mostrarUsuario($nombre);
    if ($datosRecuperados['desactivado'] == 0) {
      $datos='Activado';
    } else {
      $datos='Desactivado';
    }
    echo $datosRecuperados['idUsuario'] . " " . $datosRecuperados['username'] . " " . $datosRecuperados['email'] . " " . $datosRecuperados['name'] . " " . $datosRecuperados['surname']
    . " " . $datosRecuperados['idTipoUsuario'] . " " . $datos;
  } /***FIN MÉTODO mostrar() ***/

  public function desactivar($valor,$nombre){
    $desactivo=$this->objUser->desactivarCuenta($valor,$nombre);
  } /***FIN MÉTODO desactivar() ***/

} /***FIN CLASE Admin ***/
 ?>
