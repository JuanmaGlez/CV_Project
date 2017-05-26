<?php 

	require_once('Conectar.php');

	class Usuarios {

		//Atributos de la clase Usuarios
		private $conectarse;
		private $idUsuario;
		private $username;
		private $password;
		private $email;
		private $name;
		private $surname;
		private $dni;
		private $birthday;
		private $address;
		private $postal;
		private $town;
		private $province;
		private $mobile;
		private $telephone;
		private $tipoUsuario;
		private $estado;
		private $registro;
		private $photo;
		private $conectado;
		private $empezar_desde;
		private $tamano_paginas;

		//private $usuarios;
		//private $usuario;

		//Método Constructor de la Clase
		public function __construct($idUsuario=null){
			$this->conectarse= new Conectar(); //Creamos el objeto de la conexión
			$this->conectado=$this->conectarse->conexion(); //realizamos la conexión y la guardamos en una variable
			if($idUsuario != "" || $idUsuario != 0){
        		$this->idUsuario=$idUsuario;
        		$this->recuperar();
      		} //***FIN if***			

		} // Fin del Método Constructor

		//Método Recuperar Datos del Usuario de la Base de Datos
	    public function recuperar(){
	      $datosArray="SELECT * FROM usuarios WHERE idUsuario = $this->idUsuario";	      
	      $datos=$this->conectado->query($datosArray);
	      if($datosRecuperados=$datos->fetch_assoc()){	    
	        $this->idUsuario=$datosRecuperados['idUsuario'];
	        $this->username=$datosRecuperados['username'];
	        $this->password=$datosRecuperados['password'];
	        $this->email=$datosRecuperados['email'];
	        $this->name=$datosRecuperados['name'];
	        $this->surname=$datosRecuperados['surname'];
	        $this->dni=$datosRecuperados['dni'];
	        $this->birthday=$datosRecuperados['birthday'];
	        $this->address=$datosRecuperados['address'];
	        $this->postal=$datosRecuperados['postal'];
	        $this->town=$datosRecuperados['town'];
	        $this->province=$datosRecuperados['province'];
	        $this->mobile=$datosRecuperados['mobile'];
	        $this->telephone=$datosRecuperados['telephone'];
	        $this->tipoUsuario=$datosRecuperados['tipoUsuario'];
	        $this->estado=$datosRecuperados['estado'];
	       	$this->registro=$datosRecuperados['registro'];
	       	$this->photo=$datosRecuperados['photo'];
	        
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

	    //Método devolver dni
	    public function getDNI(){
	      return $this->dni;
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
	    public function getTipoUsuario(){
	      return $this->tipoUsuario;
	    }

	    //Método devolver estado
	    public function getEstado(){
	      return $this->estado;
	    }

	    //Método devolver registro, fecha que se registro
	    public function getRegistro(){
	      return $this->registro;
	    }

	    //Método devolver photo, foto para curriculum
	    public function getPhoto(){
	      return $this->photo;
	    }
	    

			// Método de volver todos los datos de los usuarios
		public function getUsuarios() {
			$this->paginar();
			//$sql="SELECT * FROM usuarios LIMIT 1, 10";
			$sql="SELECT * FROM usuarios LIMIT $this->empezar_desde, $this->tamano_paginas";
			$resultado=$this->conectado->query($sql);
			while ($filas=$resultado->fetch_assoc()) {
				$this->usuarios[]=$filas;
			}
			return $this->usuarios;			
			$this->conectarse->desconexion();
		} // Fin método devolver usuarios

		// Método que de vuelve los datos de un usuario en concreto
		public function getUsuario($idUsuario) {
			$sql="SELECT * FROM usuarios where idUsuario = '$idUsuario'";
			$resultado=$this->conectado->query($sql);
			while ($filas=$resultado->fetch_assoc()) {
				$this->usuario[]=$filas;
			}
			return $this->usuario;			
			$this->conectarse->desconexion();
		} // Fin método devolver usuarios

		//Método comprobar si usuario existe
		public function checkUsuario($username,$email) {
			$consulta="SELECT idUsuario FROM usuarios WHERE username = '$username' and email = '$email'";
			//$consulta2="SELECT idUsuario FROM usuarios WHERE email = 'email'";
			$valor=$this->conectado->query($consulta);
			//$valor2=$this->conectado->query($consulta2);
			return $valor;

		}

		// Método para insertar usuario
		public function crearUsuario($username, $password, $email, $name, $surname, $dni, $birthday, $address, 
			$postal, $town, $province, $mobile, $telephone){
			
			$valor=$this->checkUsuario($username,$email);
			
			if ($valor->num_rows == 0) {
				$sql="INSERT INTO usuarios (username, password, email, name, surname, dni, birthday, address, postal, town, province, mobile, telephone) VALUES ('$username','$password','$email',
					'$name','$surname','$dni','$birthday','$address','$postal','$town','$province','$mobile',
					'$telephone')";
				
				$resultado=$this->conectado->query($sql);
			
				if ($resultado) {
					return 2;
				} else {
					return 1;
				} // fin del IF ELSE anidado
			} else {
				return 0;
			} // fin del IF ELSE

		} // Fin método crearUsuario

		// Método buscar Usuario
		public function buscarUsuario($username){							
			$consulta="SELECT * FROM usuarios WHERE username = '$username'";			
			
			$valor=$this->conectado->query($consulta);
			
			if ($resultado=$valor->fetch_assoc()) {
				$this->idUsuario=$resultado['idUsuario'];
        		$this->tipoUsuario=$resultado['tipoUsuario'];
        		return $resultado;
			}
		}// Fin método buscarUsuario()


	    public function buscarEmail($email){
	      $sql="SELECT * FROM usuarios WHERE email = '$email'";
	      $datos=$this->conectado->query($sql);
	      if ($valor=$datos->fetch_assoc()){
	        return $valor;
	      }
	    }

		//Método Modificar Datos personales
	    public function setDatosPersonales($username,$password,$email,$name,$surname,$dni,$birthday,$address,$postal,$town,$province,$mobile,$telephone){
	        $modificado=array();
	        if($this->username != $username){
	            $sql = "UPDATE usuarios SET username = '$username' WHERE idUsuario ='$this->idUsuario'";
	            
	            $modificado['username'] = $this->conectado->query($sql);
	        }
	        if($this->password != $password){
	            $sql = "UPDATE usuarios set password = '$password' where idUsuario ='$this->idUsuario'";
	            
	            $modificado['password'] = $this->conectado->query($sql);
	        }
	        if($this->email != $email){
	            $sql = "UPDATE usuarios set email = '$email' where idUsuario ='$this->idUsuario'";
	            $modificado['email'] = $this->conectado->query($sql);
	        }
	        if($this->name != $name){
	            $sql = "UPDATE usuarios set name = '$name' where idUsuario ='$this->idUsuario'";
	            $modificado['name'] = $this->conectado->query($sql);
	        }
	        if($this->surname != $surname){
	            $sql = "UPDATE usuarios set surname = '$surname' where idUsuario ='$this->idUsuario'";
	            $modificado['surname'] = $this->conectado->query($sql);
	        }
	        if($this->dni != $dni){
	            $sql = "UPDATE usuarios set dni = '$dni' where idUsuario ='$this->idUsuario'";
	            $modificado['dni'] = $this->conectado->query($sql);
	        }
	        if($this->birthday != $birthday){
	            $sql = "UPDATE usuarios set birthday = '$birthday' where idUsuario ='$this->idUsuario'";
	            $modificado['birthday'] = $this->conectado->query($sql);
	        }
	        if($this->address != $address){
	            $sql = "UPDATE usuarios set address = '$address' where idUsuario ='$this->idUsuario'";
	            $modificado['address'] = $this->conectado->query($sql);
	        }
	        if($this->postal != $postal){
	            $sql = "UPDATE usuarios set postal = '$postal' where idUsuario ='$this->idUsuario'";
	            $modificado['postal'] = $this->conectado->query($sql);
	        }
	        if($this->town != $town){
	            $sql = "UPDATE usuarios set town = '$town' where idUsuario ='$this->idUsuario'";
	            $modificado['town'] = $this->conectado->query($sql);
	        }
	        if($this->province != $province){
	            $sql = "UPDATE usuarios set province = '$province' where idUsuario ='$this->idUsuario'";
	            $modificado['province'] = $this->conectado->query($sql);
	        }
	        if($this->mobile != $mobile){
	            $sql = "UPDATE usuarios set mobile = '$mobile' where idUsuario ='$this->idUsuario'";
	            $modificado['mobile'] = $this->conectado->query($sql);
	        }
	        if($this->telephone != $telephone){
	            $sql = "UPDATE usuarios set telephone = '$telephone' where idUsuario ='$this->idUsuario'";
	            $modificado['telephone'] = $this->conectado->query($sql);
	        }
	        if($modificado){
	          //echo "Los datos has sido modificados correctamente";
	          //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
	          return 1;
	        } else {
	          //echo "No se ha modificado ningún dato";
	          return 0;
	        }
	    } // Fin método modificar Datos Personales

	    public function desactivarCuenta ($idUsuario) {
	    	$sql = "UPDATE usuarios set estado = 'desactivado' where idUsuario = $idUsuario";
	    	$valorDesactivar=$this->conectado->query($sql);
	    }

	    // Método para paginar   ¿¿??
	    public function paginar() {
	    	$this->tamano_paginas=10;

      		if (isset($_GET["pagina"])) {
      
        		if ($_GET["pagina"]==1) {
          			header("location:index.php");
        		} else {
          			$pagina=$_GET["pagina"];
        		}

      		} else {
        		$pagina=1;
      		}

      	    //variable que guarda el valor inicial que debe mostrar la página.
      		$this->empezar_desde=($pagina-1)*$this->tamano_paginas;

      		$sql_total="SELECT * FROM usuarios"; //limit admite dos datos, el primero seria cual es el primero que quieres ver, y el segundo es hasta cuanto quieres ver. En este caso tb se puede poner LIMIT 3.

      		$resultado=$this->conectado->query($sql_total);

	    	//variables que guarda el números de filas que nos devuelve la consulta en total.
	    	$num_filas=$resultado->num_rows;

			//variable que guarda el número de páginas total que vamos a tener.
	     	//la fx ceil redondea a la alza.
	     	$total_paginas=ceil($num_filas/$this->tamano_paginas);
	     	define("TOTAL_PAGINAS", "$total_paginas");
	    	//$total_paginas=ceil($num_filas/$this->tamano_paginas);
	    } // Fin método paginar

	    public function setFoto($photo){
	    	$sql = "UPDATE usuarios set photo = '$photo' where idUsuario ='$this->idUsuario'";
	    	$upPhoto=$this->conectado->query($sql);
	    }

	} // Fin de la Clase Usuario	

	$a=new Usuarios(5);
	$b=$a->getUsuarios();
	foreach ($b as $registros) {
			echo "<tr><td>" . $registros["name"] . ' ' . $registros["surname"] . ' ' . $registros["photo"] ."<br></td></tr>";
		}
	echo $a->getPhoto();

 ?>