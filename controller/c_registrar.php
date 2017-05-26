<?php 
	require_once("../model/Usuarios.php");
	// Clase Registrar 
	class Registrar {

		// Propiedades de la Clase Registrar
		public $username;
		public $password;
		public $email;
		public $name;
		public $surname;
		public $dni;
		public $birthday;
		public $address;
		public $postal;
		public $town;
		public $province;
		public $mobile;
		public $telephone;
		private $objetjoUsuario;


		// Constructor de la Clase Registrar
		public function __construct(){
			$this->objetjoUsuario=new Usuarios();
			$this->username=$_POST['username'];
			$contrasenia=$_POST['password'];
			$this->password=password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
			$this->email=$_POST['email'];
			$this->name=$_POST['name'];
			$this->surname=$_POST['surname'];
			$this->dni=$_POST['dni'];
			$this->birthday=$_POST['birthday'];
			$this->address=$_POST['address'];
			$this->postal=$_POST['postal'];
			$this->town=$_POST['town'];
			$this->province=$_POST['province'];
			$this->mobile=$_POST['mobile'];
			$this->telephone=$_POST['telephone'];			
		}

		// Método para pasar los datos a la Clase Usuarios
		public function insertar(){
			$resultado=$this->objetjoUsuario->crearUsuario($this->username, $this->password, $this->email,
				$this->name, $this->surname, $this->dni, $this->birthday, $this->address, $this->postal, 
				$this->town, $this->province, $this->mobile, $this->telephone);			
			if ($resultado==2) {
				echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
			} elseif ($resultado==1) {
				echo "Faltan campos por rellenar";
			} else {
				echo "El usuario ya existe";
			}
		} // Fin método insertar



	}

 ?>