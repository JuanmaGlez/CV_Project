<?php 

	require_once('Usuarios.php');

	class Filtrarlos {

		private $tipo;
		private $tipo2;
		private $desde;
		private $hasta;
		private $provincia;
		public $objetoUsuario;

		public function __construct() {
			$this->objetoUsuario = new Usuarios();			
			$this->tipo=isset($_POST['tipo']) ? $_POST['tipo'] : null;
			//echo $this->tipo;
			$this->tipo2=isset($_POST['tipo_provincia']) ? $_POST['tipo_provincia'] : null;
			//echo $this->tipo2;
			//$this->desde=date('Y') - $_POST['hasta'];		
			//$this->hasta=date('Y') - $_POST['desde'];
			$this->desde=isset($_POST['hasta']) ? $_POST['hasta'] : null;
			$this->hasta=isset($_POST['desde']) ? $_POST['desde'] : null;
			$this->provincia=isset($_POST['provincia']) ? $_POST['provincia'] : null;
		}

		public function mostrarFiltro() {
			$arrayPersonas=$this->objetoUsuario->filtrar($this->tipo,$this->tipo2,$this->desde,$this->hasta, $this->provincia);
			if ($arrayPersonas == 0) {
				return 0;
			} else {
				return $arrayPersonas;	
			}
			
		}


	} // Fin clase Firtrarlos

 ?>