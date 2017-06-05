<?php 	
	require_once('Usuarios.php');

	class ModificarDatos {
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
		public $objetoUsuario;


	  	// Constructor
	  	public function __construct(){
			$this->objetoUsuario=new Usuarios($_SESSION['idUsuario']);		
		    $this->username= isset($_POST['nombreusuario']) ? $_POST['nombreusuario'] : null;
		    $this->password = isset($_POST['contra']) ? $_POST['contra'] : null;
		    $this->email=isset($_POST['email']) ? $_POST['email'] : null;
		    $this->name=isset($_POST['name']) ? $_POST['name'] : null;
		    $this->surname=isset($_POST['surname']) ? $_POST['surname'] : null;
		    $this->dni=isset($_POST['dni']) ? $_POST['dni'] : null;
		    $this->birthday=isset($_POST['birthday']) ? $_POST['birthday'] : null;
		    $this->address=isset($_POST['address']) ? $_POST['address'] : null;
		    $this->postal=isset($_POST['postal']) ? $_POST['postal'] : null;
		    $this->town=isset($_POST['town']) ? $_POST['town'] : null;
		    $this->province=isset($_POST['province']) ? $_POST['province'] : null;
		    $this->mobile=isset($_POST['mobile']) ? $_POST['mobile'] : null;
		    $this->telephone=isset($_POST['telephone']) ? $_POST['telephone'] : null;
		  } // Fin Constructor

		// Método actualizar datos. Se comprueba si el email y el username existen.		  
		public function checkModificar(){			
			
			$resultado=$this->objetoUsuario->buscarUsuario($this->objetoUsuario->getUsername());
					    
		    $valor=$this->objetoUsuario->buscarEmail($this->email);

		    $contrasenia=$this->password;
			$password=password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));

		    if($resultado['email']==$this->email && $resultado['username']==$this->username){
		      $this->objetoUsuario->setDatosPersonales($this->username,$password,$this->email,$this->name,$this->surname,$this->dni,$this->birthday,$this->address,$this->postal,$this->town,$this->province,$this->mobile,$this->telephone);
		    }
		    if ($resultado['email']!=$this->email && $resultado['username']==$this->username){
		      if($valor['email']!=$this->email) {
		        $this->objetoUsuario->setDatosPersonales($this->username,$password,$this->email,$this->name,$this->surname,$this->dni,$this->birthday,$this->address,$this->postal,$this->town,$this->province,$this->mobile,$this->telephone);
		      } else {
		        echo "El email ya está siendo usado.";
		      }
		    }
		    if ($resultado['email']==$this->email && $resultado['username']!=$this->username){
		      if($valor['username']!=$this->username) {
		        $this->objetoUsuario->setDatosPersonales($this->username,$password,$this->email,$this->name,$this->surname,$this->dni,$this->birthday,$this->address,$this->postal,$this->town,$this->province,$this->mobile,$this->telephone);
		      } else {
		        echo "El nombre ya está siendo usado.";
		      }
		    }
		    if ($resultado['email']!=$this->email && $resultado['username']!=$this->username){
		        if($valor['email']!=$this->email){
		          if ($valor['username']!=$this->username) {
		            $this->objetoUsuario->setDatosPersonales($this->username,$password,$this->email,$this->name,$this->surname,$this->dni,$this->birthday,$this->address,$this->postal,$this->town,$this->province,$this->mobile,$this->telephone);
		          } else {
		            echo "El nombre ya está siendo usado.";
		            }
		        } else {
		          echo "El email ya está siendo usado. 2";
		          }
		          //echo "El nombre y/o email ya están siendo usados";
		    }
		    if ($this->objetoUsuario) {
		    	$_SESSION['username']=$this->username;
		    	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../controller/c_perfil.php\">";
		    } else {
		    	echo "No se ha modificado ningún dato";
		    }
		      
		  } // Fin método comprobar usuario 
		    
		
	} // Fin de la Clase

 ?>