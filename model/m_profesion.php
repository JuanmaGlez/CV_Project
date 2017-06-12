<?php 
	//session_start();
	require_once("Profesion.php");
	/**
	* 
	*/
	class Profex extends Profesion {

		private $idCurri;			
		private $occupation;
		private $start;
		private $end;
		private $company;
		private $town;
		private $province;
		private $description;
		
		public function __construct() {
			parent::__construct();
			/*$this->idCurri=$_POST[''];
			$this->occupation=$_POST[''];
			$this->start=$_POST[''];
			$this->end=$_POST[''];
			$this->company=$_POST[''];
			$this->town=$_POST[''];
			$this->province=$_POST[''];
			$this->description=$_POST[''];*/
			
		}

		public function mostrar() {

			$arrayPersonas=$this->getProfesion($_SESSION['idUsuario']);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún profesión registrada";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function profe(){
			$guardado=$this->addProfesion($this->occupation, $this->start, $this->end, $this->company, $this->town, $this->province, $this->description);
			if ($guardado == 1) {
				echo "Profesión guardada correctamente";				
			} else {
				echo "Error al guardar";
			}
		}



	}

 ?>