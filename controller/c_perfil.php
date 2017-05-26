<?php 

	session_start();
	// Llamamos a la Clase Usuario
	require_once('../model/Usuarios.php');

	// Clase Perfil, donde se verifica la password del usuario entre otras cosas
	class Perfil {

		private $usuario;
		private $contrasena;
		public $objetoUsuario;
		

		// Método Constructor de la Clase Perfil		
		public function __construct($usuario,$contrasena){
			$this->usuario=$usuario;
			$this->contrasena=$contrasena;			
			//$this->objetoUsuario=new Usuarios($_SESSION['idUsuario']);
			if (empty($_SESSION['idUsuario'])) {
				$this->objetoUsuario=new Usuarios();
			} else {
				$this->objetoUsuario=new Usuarios($_SESSION['idUsuario']);
			}

		} // Fin Constructor

		// Método checkLogin
		public function checKLogin() {
			$datosarray=$this->objetoUsuario->buscarUsuario($this->usuario);
			if ($datosarray != 0) {				
				
				if ($datosarray['estado'] == 'activado') {
					if (password_verify($this->contrasena, $datosarray['password'])) {
						$_SESSION['idUsuario']=$datosarray['idUsuario'];
						$_SESSION['username']=$datosarray['username'];
						$_SESSION['pass']=$this->contrasena;
						$_SESSION['tipoUsuario']=$datosarray['tipoUsuario'];
						$_SESSION['loggedin'] = true;
						$_SESSION['start'] = time();
		        		$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
						echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
					} else {
						echo "Usuario o Contraseña son incorrectos.";
					} // Fin Condición verificar password
				} else {
					echo "Este usuario esta desactivado.";
				} // Fin Condición estado
			} else {
				echo "Usuario no existe";
			}
		} // Fin método checkLogin

		public function guardarLogin($usuario) {
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				setcookie("nombre_usuario", "$usuario", time()+86400);
			}
		}

		public function checkConexion(){
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		    } else {
		      echo "Solo usuarios registrados.<br>";
		      echo "<br><a href='../view/v_login.php'>Login</a>";
		    exit;
		    }

		    $ahora = time();

		    if ($ahora > $_SESSION['expire']) {
		      session_destroy();
		      //echo "Su sesión ha terminado. <a href='../view/v_login.php'>Volver a Entrar</a>";
		      echo "Su sesión ha terminado. <a href='../view/v_login.php'><input type='button' name='salir' value='Login'></a>";
		      //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_login.php\">";
		      exit;
		    }
  }

		// Método cerrar sesión
		public function closeSession(){    
		    unset ($_SESSION['username']);
		    session_destroy();
		    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../\">";
		    exit;
		} //Fin método cerrar sesión


	} // Fin de la Clase Perfil
 ?>