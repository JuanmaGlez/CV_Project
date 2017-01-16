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
  //require_once("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/rprueba6.php");

  class Usuarios {

    // Definimos las propiedades o atributos
    public $idUsuario;
    public $username;
    public $password;
    public $email;
    public $name;
    public $surname;
    public $birthday;
    public $address;
    public $postal;
    public $town;
    public $province;
    public $mobile;
    public $telephone;
    public $idTipos;
    public $error;
    private $conectarse;

    //Método Constructor
    /*public function __construct($username,$password,$email,$name,$surname,$birthday,
    $address,$postal,$town,$province,$mobile,$telephone)*/
    public function __construct($idUsuario=null){
      echo "Clase Usuario. Constructor1 " . $this->conectarse->login . $this->conectarse->contrasena . "<br>";
      $this->conectarse=new Conectar();
      echo "Clase Usuario. Constructor2. Inicio Clase Conectar " . $this->conectarse->login . "<br>" . $this->conectarse->contrasena . "<br>";
      $this->conectarse->conexion();
      echo "Clase Usuario. Constructor3. Inicio conexion" . $this->conectarse->login . $this->conectarse->contrasena . "<br>";
      //$this->conectarse=new PruebaC();
      //$this->conectarse->conex();
      if($idUsuario != "" || $idUsuario != 0){
        $this->idUsuario=$idUsuario;
        $this->recuperar();
      } //***FIN if***
      echo "Clase Usuario. Constructor4. Fin Constructor " . $this->conectarse->login . $this->conectarse->contrasena . "<br>";
    }// ****** FIN CONSTRUCTOR ********


    //Métodos
    //Método Recuperar Datos del Usuario de la Base de Datos
    public function recuperar(){
      //echo "Clase Usuario. recuperar " . $this->conectarse->contrasena;
      $datosArray="SELECT * FROM usuarios WHERE idUsuario = $this->idUsuario";
      if($datosRecuperados=$this->conectarse->query($datosArray)){
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
        $this->idTipos=$datosRecuperados['idTipos'];
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
    public function buscarUsuario($username,$password,$email){
      if($email){
        $sql="Select idUsuario from usuarios where username='$username' and email='$email'";
        //$this->conectarse->conexion();
        $resultado=$this->conectarse->query($sql);
        //echo "$resultado[idUsuario]";
        //if ($resultado["idUsuario"]>0)
        if ($resultado>0){
          return $resultado;
        } else {
          return $resultado;
        }
      } else {
            $sql="SELECT * FROM usuarios where username = '$username' AND password = '$password'";
          //  $this->conectarse->conexion();
            $resultado=$this->conectarse->query($sql);
            $this->idUsuario=$resultado['idUsuario'];
            $this->idTipos=$resultado['idTipoUsuario'];
            return $resultado;
            //$a=$this->conectarse->query($sql);
            //echo $a;
            //return $a;
        }
    } //*** FIN MÉTODO buscarUsuario

    //Método Crear Usuario
    public function crearUsuario($username,$password,$email,$name,$surname,$birthday,
    $address,$postal,$town,$province,$mobile,$telephone=null){
      $sql="insert into usuarios (`username`,`password`,`email`,`name`,`surname`,`birthday`,`address`,`postal`,`town`,`province`,`mobile`,`telephone`) values
      ('$username','$password','$email','$name','$surname','$birthday','$address',$postal,'$town','$province',$mobile,$telephone)";
      $resultado=$this->conectarse->query($sql);
      if ($resultado){
        //echo "Usuario Creado";
        header('location:http://jmgonzalez.com/proyecto_curri4/view/v_login.php');
      } else {
        echo "Error al crear el usuario";
      }
    } //*** FIN MÉTODO crearUsuario

    //Método Modificar Datos personales
    public function setDatosPersonales($username,$password,$email,$name,$surname,$birthday,$address,$postal,$town,$province,$mobile,$telephone){
    //public function setDatosPersonales($datos)
    //echo "Clase Usuario. datos personales " . $this->conectarse->contrasena;
        $modificado=array();
        /*if($username==""){
          $username=$this->username;
        }*/
        if($this->username != $username){
            //echo $this->username . "usuariobd <br>";
            //echo $username . "usuario nuevo <br>";
            //$usuario =  htmlspecialchars($datos['username']);
            //echo "error1 <br>";
            $sql = "UPDATE usuarios SET username = '$username' WHERE idUsuario ='$this->idUsuario'";
        //    echo $sql;
            $modificado['username'] = $this->conectarse->query($sql);
        }

        /*if($password==""){
          $password=$this->password;
        }*/
        if($this->password != $password){
          //echo "error 2";
            //$contrasena =  htmlspecialchars($datos['password']);
            $sql = "UPDATE usuarios set password = '$password' where idUsuario ='$this->idUsuario'";
            $modificado['password'] = $this->conectarse->query($sql);
        }

        /*if($email==""){
          $email=$this->email;
        }*/
        if($this->email != $email){
          //echo "error 3";
            //$correo =  htmlspecialchars($datos['email']);
            $sql = "UPDATE usuarios set email = '$email' where idUsuario ='$this->idUsuario'";
            $modificado['email'] = $this->conectarse->query($sql);
        }

        /*if($name==""){
          $name=$this->name;
        }*/
        if($this->name != $name){
          //echo "error 4";
            //echo $this->name . "1 <br>";
            //echo $name . "2 <br>" ;
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set name = '$name' where idUsuario ='$this->idUsuario'";
            $modificado['name'] = $this->conectarse->query($sql);
        }

        /*if($surname==""){
          $surname=$this->surname;
        }*/
        if($this->surname != $surname){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set surname = '$surname' where idUsuario ='$this->idUsuario'";
            $modificado['surname'] = $this->conectarse->query($sql);
        }

        /*if($birthday==""){
          $birthday=$this->birthday;
        }*/
        if($this->birthday != $birthday){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set birthday = '$birthday' where idUsuario ='$this->idUsuario'";
            $modificado['birthday'] = $this->conectarse->query($sql);
        }

        /*if($address==""){
          $address=$this->address;
        }*/
        if($this->address != $address){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set address = '$address' where idUsuario ='$this->idUsuario'";
            $modificado['address'] = $this->conectarse->query($sql);
        }

        /*if($postal==""){
          $postal=$this->postal;
        }*/
        if($this->postal != $postal){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set postal = '$postal' where idUsuario ='$this->idUsuario'";
            $modificado['postal'] = $this->conectarse->query($sql);
        }

        /*if($town==""){
          $town=$this->town;
        }*/
        if($this->town != $town){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set town = '$town' where idUsuario ='$this->idUsuario'";
            $modificado['town'] = $this->conectarse->query($sql);
        }

        /*if($province==""){
          $province=$this->province;
        }*/
        if($this->province != $province){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set province = '$province' where idUsuario ='$this->idUsuario'";
            $modificado['province'] = $this->conectarse->query($sql);
        }

        /*if($mobile==""){
          $mobile=$this->mobile;
        }*/
        if($this->mobile != $mobile){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set mobile = '$mobile' where idUsuario ='$this->idUsuario'";
            $modificado['mobile'] = $this->conectarse->query($sql);
        }

        /*if($telephone==""){
          $telephone=$this->telephone;
        }*/
        if($this->telephone != $telephone){
            //$nombre = htmlspecialchars($datos['name']);
            $sql = "UPDATE usuarios set telephone = '$telephone' where idUsuario ='$this->idUsuario'";
            $modificado['telephone'] = $this->conectarse->query($sql);
        }
        if($modificado){
          //echo "Datos modificados";
          header('location:http://jmgonzalez.com/proyecto_curri4/view/v_administrador/v_administrador.php');
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
      $sql = "SELECT username FROM usuarios";
      $row_lista = $this->conectarse->query($sql);

    } //*** FIN MÉTODO listarUsuario

  //$this->conectarse->desconexion();

} //*** FIN DE LA CLASE Usuario ***

?>
