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
		
		public function __construct() {
			parent::__construct();
			/*$this->idCurri=$_POST[''];
			$this->formation=$_POST[''];
			$this->start=$_POST[''];
			$this->end=$_POST[''];
			$this->studyCenter=$_POST[''];
			$this->town=$_POST[''];
			$this->province=$_POST[''];
			$this->grade=$_POST[''];*/
			
		}

		public function mostrar() {
			$arrayPersonas=$this->getFormacion($_SESSION['idUsuario']);
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



	}

 ?>