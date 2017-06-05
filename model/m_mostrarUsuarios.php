<?php 

	/*require_once('../model/Usuarios.php');
	$objetoUsuario = new Usuarios();

	$arrayPersonas = $objetoUsuario->getUsuarios();	
	 if(isset($_POST['boton_desactivar'])){
                $objetoUsuario->desactivarCuenta($arrayPersonas['idUsuario']);
              } 

	require_once('../view/v_mostrarUsuario.php');*/

	require_once("Usuarios.php");

	class MostrarUsuario {

		private $objetoUsuario;

		public function __construct() {
			$this->objetoUsuario = new Usuarios();
		}

		public function mostrar() {
			$arrayPersonas=$this->objetoUsuario->getUsuarios();
			return $arrayPersonas;
		}

		public function desactivar($idUsuario) {
			$this->objetoUsuario->desactivarCuenta($idUsuario);
		}

		public function activar($idUsuario) {
			$this->objetoUsuario->activarCuenta($idUsuario);
		}

		public function addUser($username, $email, $tipoUsuario, $estado) {
			$contrasenia=$username;
			$password=password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
			$dni=$username;
			$resultado=$this->objetoUsuario->addUser($username, $password, $email, $dni, $tipoUsuario, $estado);

			if  ($resultado==2) {
				echo "usuario registrado";
			} elseif ($resultado==1) {
				echo "Faltan campos por rellenar";
			} else {
				echo "El usuario ya existe";
			
			}
		}

	} // Fin de la clase

 ?>