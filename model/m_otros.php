<?php 
	//session_start();
	require_once("Otros.php");
	/**
	* 
	*/
	class OtrosDatos extends Otros {

		private $idCurri;			
		private $lenguage;
		private $card;
		private $ability;
		private $knowledge;
		private $hobby;		
		
		public function __construct($idOtros=null) {
			parent::__construct($idOtros);
			//$this->idCurri=$_POST[''];
			$this->lenguage=isset($_POST['nombreidiomas']) ? $_POST['nombreidiomas'] : null;
			$this->card=isset($_POST['carnet']) ? $_POST['carnet'] : null;
			$this->ability=isset($_POST['habil']) ? $_POST['habil'] : null;
			$this->knowledge=isset($_POST['cono']) ? $_POST['cono'] : null;
			$this->hobby=isset($_POST['hoby']) ? $_POST['hoby'] : null;	
			
		}

		public function mostrar() {

			$arrayPersonas=$this->getOtros($_SESSION['idUsuario']);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún dato registrado";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function mostrarOtrox($idCurri) {

			$arrayPersonas=$this->getOtrox($idCurri);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún dato registrado";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function otro(){
			$guardado=$this->addOtros($this->lenguage, $this->card, $this->ability, $this->knowledge, $this->hobby);
			if ($guardado == 1) {
				echo "Otros Datos guardada correctamente";				
			} else {
				echo "Error al guardar";
			}
		}

		public function dropOtro($idOtros) {
			$borrar=$this->dropOtros($idOtros);
			/*$borrar=$this->dropFormacion($idFormacion);
			if ($borrar == 1) {
				echo "Formación borrada correctamente";
			}*/
		}

		public function setOtros(){	
			$modificarO=$this->setOtrox($this->lenguage,$this->card,$this->ability,$this->knowledge,$this->hobby);
			if ($modificarO==1) {
				echo "Datos modificada correctamente";
			} else {
				echo "No se ha modificado";
			}
		}

	} // Fin de la clase

 ?>