<?php
/*
 * @author Juanma
 * @version 0.1
 *
 * Esta clase nos va a permitir manejar los objetos Conectar
 *
 * Clase Conectar
 * Vamos a realizar con ellas las siguientes acciones:
 * Conexion a la Base de Datos
 * Desconexión a la Base de Datos
 * Consultas a la Base de Datos
 *
 */

 /*
  * Definimos la clase Conectar
  */
class Conectar{
  private $serverlocal;
  public $login;
  public $contrasena;
  private $basedatos;
  private $charset;
  private $conex;

  //Creamos el método constructor
  public function __construct(){
    $datos_bd = require_once '/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/config/db.php';
    echo "Clase conectar" . " " . $datos_bd["login"] . " " . $datos_bd["contrasena"] . "<br>";
    $this->serverlocal=$datos_bd["serverlocal"];
    $this->login=$datos_bd["login"];
    $this->contrasena=$datos_bd["contrasena"];
    $this->basedatos=$datos_bd["basedatos"];
    $this->charset=$datos_bd["charset"];
  }

  //Creamos el método de conexión
  public function conexion(){
    $this->conex = new mysqli($this->serverlocal, $this->login, $this->contrasena, $this->basedatos);
    $this->conex->query("SET NAMES '".$this->charset."'");

    if ($this->conex->connect_error) {
      die("La conexión ha fallado: " . $this->conex->connect_error);
    }
    return $this->conex;
  }

  //Creamos el método desconexión
  public function desconexion(){
    return $this->conex->close();
  }

  //Creamos el método Consultas
  public function query($consulta){
    //echo "hola <br>";
    //echo "$consulta <br>";
    $resultado=$this->conex->query($consulta);
    if(!$resultado){
          echo "error en la consulta";
          exit;
        }
    if($resultado->num_rows === 0){
      //echo "Ups. No hay ningun resultado";
      //exit;
      //return $resultado;
    }
    /*$valor=$resultado->fetch_assoc();
    return $valor;*/
    if($resultado===true){
      //echo "error por aqui";
      return $resultado;
    } else {
      $valor=$resultado->fetch_assoc();
      //echo "error aqui";
      return $valor;
    }

  }

}

/*$obj = new Conectar();
echo $obj->server;
echo $obj->userbd;
echo $obj->pwdbd;
echo $obj->database;*/
 ?>
