<?php
/*
 * @author Juanma
 * @version 0.1
 *
 * Esta clase nos va a permitir manejar los objetos usuarios
 *
 * Clase Usuarios
 * Vamos a realizar con ellas las siguientes acciones
 * Buscar Usuario
 * Crear Usuarios
 * Modificar Datos personales del usuarios
 * Devolver Datos personales del usuarios
 * Desactivar Cuenta
 * Eliminar Cuenta
 * Listar Usuarios
 *
 */

 /*
  * Definimos la clase Usuarios
  */
  session_start();
  require_once("Conectar.php");

  class Usuarios {

    // Definimos las propiedades o atributos
    private $idUsuario;
    private $username;
    private $password;
    private $email;
    private $name;
    private $surname;
    private $birthday;
    private $address;
    private $postal;
    private $town;
    private $province;
    private $mobile;
    private $telephone;
    private $idTipos;
    private $error;
    public $conectarse;

    //Método Constructor
    public function __construct($idUsuario=null){
      //$this->conectarse=new Conectar();
      $conect=new Conectar();
      $this->conectarse=$conect->conexion();
      if($idUsuario != "" || $idUsuario != 0){
        $this->idUsuario=$idUsuario;
        $this->recuperar();
      } //***FIN if***
    }// ****** FIN CONSTRUCTOR ********


    //Métodos
    //Método Recuperar Datos del Usuario de la Base de Datos
    public function recuperar(){
      $datosArray="SELECT * FROM usuarios WHERE idUsuario = $this->idUsuario";
      $datos=$this->conectarse->query($datosArray);
      if($datosRecuperados=$datos->fetch_assoc()){
      //if($datosRecuperados=$this->conectarse->query($datosArray))
        $this->idUsuario=$datosRecuperados['idUsuario'];
        $this->username=$datosRecuperados['username'];
        $this->password=$datosRecuperados['password'];
        $this->email=$datosRecuperados['email'];
        $this->name=$datosRecuperados['name'];
        $this->surname=$datosRecuperados['surname'];
        $this->birthday=$datosRecuperados['birthday'];
        $this->address=$datosRecuperados['address'];
        $this->postal=$datosRecuperados['postal'];
        $this->town=$datosRecuperados['town'];
        $this->province=$datosRecuperados['province'];
        $this->mobile=$datosRecuperados['mobile'];
        $this->telephone=$datosRecuperados['telephone'];
        $this->idTipos=$datosRecuperados['idTipoUsuario'];
      } //***FIN if***
    } //**** FIN METODO RECUPERAR

    //Método devolver idUsuario
    public function getIdUsuario(){
      return $this->idUsuario;
    }

    //Método devolver username
    public function getUsername(){
      return $this->username;
    }

    //Método devolver password
    public function getPassword(){
      return $this->password;
    }

    //Método devolver email
    public function getEmail(){
      return $this->email;
    }

    //Método devolver name
    public function getName(){
      return $this->name;
    }

    //Método devolver surname
    public function getSurname(){
      return $this->surname;
    }

    //Método devolver birthday
    public function getBirthday(){
      return $this->birthday;
    }

    //Método devolver address
    public function getAddress(){
      return $this->address;
    }

    //Método devolver postal
    public function getPostal(){
      return $this->postal;
    }

    //Método devolver town
    public function getTown(){
      return $this->town;
    }

    //Método devolver province
    public function getProvince(){
      return $this->province;
    }

    //Método devolver mobile
    public function getMobile(){
      return $this->mobile;
    }

    //Método devolver telephone
    public function getTelephone(){
      return $this->telephone;
    }

    //Método devolver tipo de usuario
    public function getIdTipos(){
      return $this->idTipos;
    }

    //Método Buscar Usuario
    public function buscarUsuario($username,$password){
      $consulta="SELECT * FROM usuarios WHERE username = '$username' and password = '$password'";
      $datos=$this->conectarse->query($consulta);
      if($resultado=$datos->fetch_assoc()){
      //if ($resultado=$this->conectarse->query($consulta))
        $this->idUsuario=$resultado['idUsuario'];
        $this->idTipos=$resultado['idTipoUsuario'];
        $this->recuperar();
        //$this->conectarse->desconexion();
        return $resultado;
      } // **Fin if**

    } // *** Fin método buscarUsuario()***

    //Método Crear Usuario
    public function crearUsuario($username,$password,$email,$name,$surname,$birthday,
    $address,$postal,$town,$province,$mobile,$telephone=null){
      //$consulta="SELECT idUsuario FROM usuarios WHERE username = '$username' and email = '$email'";
      $consulta="SELECT idUsuario FROM usuarios WHERE username = '$username'";
      $consulta2="SELECT idUsuario FROM usuarios WHERE email = '$email'";
      $valor=$this->conectarse->query($consulta);
      $valor2=$this->conectarse->query($consulta2);
      if ($valor->num_rows == 0 and $valor2->num_rows == 0 ) {
        $sql="insert into usuarios (`username`,`password`,`email`,`name`,`surname`,`birthday`,`address`,`postal`,`town`,`province`,`mobile`,`telephone`) values
        ('$username','$password','$email','$name','$surname','$birthday','$address',$postal,'$town','$province',$mobile,$telephone)";
        $resultado=$this->conectarse->query($sql);
        //$this->conectarse->desconexion();
        if ($resultado){
          return 2;
          //echo "Usuario Creado";
        } else {
          return 0;
          //echo "Error al crear el usuario";
        }
      } else {
        return $valor;
      }
    } //*** FIN MÉTODO crearUsuario

    //Método Modificar Datos personales
    public function setDatosPersonales($username,$password,$email,$name,$surname,$birthday,$address,$postal,$town,$province,$mobile,$telephone){
        $modificado=array();
        if($this->username != $username){
            $sql = "UPDATE usuarios SET username = '$username' WHERE idUsuario ='$this->idUsuario'";
            $modificado['username'] = $this->conectarse->query($sql);
        }
        if($this->password != $password){
            $sql = "UPDATE usuarios set password = '$password' where idUsuario ='$this->idUsuario'";
            $modificado['password'] = $this->conectarse->query($sql);
        }
        if($this->email != $email){
            $sql = "UPDATE usuarios set email = '$email' where idUsuario ='$this->idUsuario'";
            $modificado['email'] = $this->conectarse->query($sql);
        }
        if($this->name != $name){
            $sql = "UPDATE usuarios set name = '$name' where idUsuario ='$this->idUsuario'";
            $modificado['name'] = $this->conectarse->query($sql);
        }
        if($this->surname != $surname){
            $sql = "UPDATE usuarios set surname = '$surname' where idUsuario ='$this->idUsuario'";
            $modificado['surname'] = $this->conectarse->query($sql);
        }
        if($this->birthday != $birthday){
            $sql = "UPDATE usuarios set birthday = '$birthday' where idUsuario ='$this->idUsuario'";
            $modificado['birthday'] = $this->conectarse->query($sql);
        }
        if($this->address != $address){
            $sql = "UPDATE usuarios set address = '$address' where idUsuario ='$this->idUsuario'";
            $modificado['address'] = $this->conectarse->query($sql);
        }
        if($this->postal != $postal){
            $sql = "UPDATE usuarios set postal = '$postal' where idUsuario ='$this->idUsuario'";
            $modificado['postal'] = $this->conectarse->query($sql);
        }
        if($this->town != $town){
            $sql = "UPDATE usuarios set town = '$town' where idUsuario ='$this->idUsuario'";
            $modificado['town'] = $this->conectarse->query($sql);
        }
        if($this->province != $province){
            $sql = "UPDATE usuarios set province = '$province' where idUsuario ='$this->idUsuario'";
            $modificado['province'] = $this->conectarse->query($sql);
        }
        if($this->mobile != $mobile){
            $sql = "UPDATE usuarios set mobile = '$mobile' where idUsuario ='$this->idUsuario'";
            $modificado['mobile'] = $this->conectarse->query($sql);
        }
        if($this->telephone != $telephone){
            $sql = "UPDATE usuarios set telephone = '$telephone' where idUsuario ='$this->idUsuario'";
            $modificado['telephone'] = $this->conectarse->query($sql);
        }
        if($modificado){
          //echo "Los datos has sido modificados correctamente";
          echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
        } else {
          echo "Error al modificar";
        }
    } // Fin método modificar Datos Personales

/*

    //Método Desactivar Cuenta Usuario
    public function desactivarCuenta(){

    }

    //Metodo Eliminar Cuenta usuario
    public function eliminarCuenta($idUsuario){
        $sql="DROP "

    }
*/

    public function listarUsuario(){
      $sql = "SELECT username FROM usuarios ORDER BY idUsuario";
      $row_lista = $this->conectarse->query($sql);
      //$fila=$row_lista->fetch_array();
      return $row_lista;
      //while ($fila=$row_lista->fetch_array()){
        //return $fila;
        //echo '<option value="'.$fila['username'].'">'.$fila['username']. '</option>';
      //}
    } //*** FIN MÉTODO listarUsuario

    public function mostrarUsuario($nombre){
      $sql = "SELECT * FROM usuarios WHERE username = '$nombre'";
      $resultado=$this->conectarse->query($sql);
      $datosRecuperados=$resultado->fetch_assoc();
      return $datosRecuperados;
    }


} //*** FIN DE LA CLASE Usuario ***

?>
