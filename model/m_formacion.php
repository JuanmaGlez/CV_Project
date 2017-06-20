<?php 
	//session_start();
	require_once("Formacion.php");
	/**
	* 
	*/
	class Formax extends Formacion {

		private $idCurri;			
		private $formation;
		private $start;
		private $end;
		private $studyCenter;
		private $town;
		private $province;
		private $grade;
		
		public function __construct($idFomarcion=null) {
			parent::__construct($idFomarcion);
			//$this->idCurri=$_POST[''];
			$this->formation=isset($_POST['nombreformacion']) ? $_POST['nombreformacion'] : null;
			$this->start=isset($_POST['iniciof']) ? $_POST['iniciof'] : null;
			$this->end=isset($_POST['finF']) ? $_POST['finF'] : null;
			$this->studyCenter=isset($_POST['centrof']) ? $_POST['centrof'] : null;
			$this->town=isset($_POST['puef']) ? $_POST['puef'] : null;
			$this->province=isset($_POST['probf']) ? $_POST['probf'] : null;
			$this->grade=isset($_POST['notasf']) ? $_POST['notasf'] : null;
			
		}

		public function mostrar() {

			$arrayPersonas=$this->getFormacion($_SESSION['idUsuario']);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún formación registrada";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function mostrarFormax($idCurri) {

			$arrayPersonas=$this->getFormax($idCurri);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún formación registrada";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function formar(){
			$guardado=$this->addFormacion($this->formation, $this->start, $this->end, $this->studyCenter, $this->town, $this->province, $this->grade);
			if ($guardado == 1) {
				echo "Formación guardada correctamente";				
			} else {
				echo "Error al guardar";
			}
		}

		public function dropFormar($idFormacion) {
			$borrar=$this->dropFormacion($idFormacion);
			/*$borrar=$this->dropFormacion($idFormacion);
			if ($borrar == 1) {
				echo "Formación borrada correctamente";
			}*/
		}

		public function setFormar(){	
			$modificarF=$this->setFormacion($this->formation,$this->start,$this->end,$this->studyCenter,$this->town,$this->province,$this->grade);
			if ($modificarF==1) {
				echo "Formación modificada correctamente";
			} else {
				echo "No se ha modificado";
			}
		}

	} // Fin de la clase

 ?>