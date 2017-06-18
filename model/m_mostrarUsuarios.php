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

		public $objetoUsuario;
		private $tipoUsuario;

		public function __construct($idUsuario=null) {
			$this->objetoUsuario = new Usuarios($idUsuario);
			$this->tipoUsuario =isset($_POST['tipousuario']) ? $_POST['tipousuario'] : null;
			//echo $this->tipoUsuario;
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

		public function setTipo(){	
			$modificarT=$this->objetoUsuario->setTipoUsuario($this->tipoUsuario);
			if ($modificarT==1) {
				echo "Tipo de Usuario modificado correctamente";
			} else {
				echo "No se ha modificado";
			}
		}

	} // Fin de la clase

 ?>