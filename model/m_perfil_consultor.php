<?php 

	require_once('Usuarios.php');

	class Filtrarlos {

		private $tipo_edad;
		private $tipo_provincia;
		private $desde;
		private $hasta;
		private $provincia;
		private $formacion;
		private $profesion;
		public $objetoUsuario;

		public function __construct() {
			$this->objetoUsuario = new Usuarios();			
			$this->tipo_edad=isset($_POST['tipo']) ? $_POST['tipo'] : null;
			//echo $this->tipo;
			$this->tipo_provincia=isset($_POST['tipo_provincia']) ? $_POST['tipo_provincia'] : null;
			//echo $this->tipo2;
			//$this->desde=date('Y') - $_POST['hasta'];		
			//$this->hasta=date('Y') - $_POST['desde'];
			$this->desde=isset($_POST['hasta']) ? $_POST['hasta'] : null;
			$this->hasta=isset($_POST['desde']) ? $_POST['desde'] : null;
			$this->provincia=isset($_POST['provincia']) ? $_POST['provincia'] : null;
			$this->formacion=isset($_POST['formacion']) ? $_POST['formacion'] : null;
			$this->profesion=isset($_POST['profesion']) ? $_POST['profesion'] : null;
		}

		public function mostrarFiltro() {
			$arrayPersonas=$this->objetoUsuario->filtrar($this->tipo_edad,$this->tipo_provincia,$this->desde,$this->hasta, $this->provincia,$this->formacion,$this->profesion);
			if ($arrayPersonas == 0) {
				return 0;
			} else {
				return $arrayPersonas;	
			}
			
		}


	} // Fin clase Firtrarlos

 ?>