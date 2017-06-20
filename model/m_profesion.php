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
		
		public function __construct($idProfesion=null) {
			parent::__construct($idProfesion);
			//$this->idCurri=$_POST[''];			
			$this->occupation=isset($_POST['nombreprofesion']) ? $_POST['nombreprofesion'] : null;
			$this->start=isset($_POST['iniciop']) ? $_POST['iniciop'] : null;
			$this->end=isset($_POST['finP']) ? $_POST['finP'] : null;
			$this->company=isset($_POST['empresap']) ? $_POST['empresap'] : null;
			$this->town=isset($_POST['puep']) ? $_POST['puep'] : null;
			$this->province=isset($_POST['probp']) ? $_POST['probp'] : null;
			$this->description=isset($_POST['descp']) ? $_POST['descp'] : null;
			
		}

		public function mostrar() {

			$arrayPersonas=$this->getProfesion($_SESSION['idUsuario']);
			if ($arrayPersonas == 0) {
				echo "Aún no hay ningún profesión registrada";
			} else {
				return $arrayPersonas;	
			}
			
		}

		public function mostrarProfex($idCurri) {

			$arrayPersonas=$this->getProfex($idCurri);
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

		public function dropProfe($idProfesion) {
			$borrar=$this->dropProfesion($idProfesion);
			if ($borrar == 1) {
				echo "Profesión borrada correctamente";
			}
		}

		public function setProfe(){	
			$modificarP=$this->setProfesion($this->occupation,$this->start,$this->end,$this->company,$this->town,$this->province,$this->description);
			if ($modificarP==1) {
				echo "Profesión modificada correctamente";
			} else {
				echo "No se ha modificado";
			}
		}


	}

 ?>