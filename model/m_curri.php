<?php 
	//session_start();
	require_once('Curriculum.php');

	class InterCurri {

		public $objetoCurriculum;
		private $nombre_curri;
		private $nombre_curri_m;
		private $idUsuario;

		public function __construct($idCurri=null){
			$this->objetoCurriculum = new Curriculum($idCurri);
			$this->nombre_curri=isset($_POST['nombre_curri']) ? $_POST['nombre_curri'] : null;
			$this->nombre_curri_m=isset($_POST['nombreCurri']) ? $_POST['nombreCurri'] : null;
			//echo $this->nombre_curri . "¿vacio?";
			$this->idUsuario=$_SESSION['idUsuario'];
		}

		public function mostrar() {

			$arrayCurriculum=$this->objetoCurriculum->getCurriculum($_SESSION['idUsuario']);
			if ($arrayCurriculum == 0) {
				echo "Aún no hay ningún Curriculum registrado";
			} else {
				return $arrayCurriculum;	
			}
			
		}

		public function nombreCurri(){
			$guardado=$this->objetoCurriculum->addCurriculum($this->nombre_curri,$this->idUsuario);
			//echo $guardado;
			if ($guardado == 1) {
				echo "Nombre guardado correctamente";				
			} else {
				echo "Error al guardar";
			}
		}
		

		public function dropCurri($idCurri) {
			$borrar=$this->objetoCurriculum->dropCurriculum($idCurri);
			/*$borrar=$this->dropFormacion($idFormacion);
			if ($borrar == 1) {
				echo "Formación borrada correctamente";
			}*/
		}

		public function setCurri(){				
			$modificarC=$this->objetoCurriculum->setCurriculum($this->nombre_curri_m);
			//echo $modificarC . "<br>";
			if ($modificarC==1) {
				echo "Formación modificada correctamente";
			} else {
				echo "No se ha modificado";
			}
		}

		
	}

 ?>