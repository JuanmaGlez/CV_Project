<?php 
	//session_start();
	require_once('Curriculum.php');

	class InterCurri {

		public $objetoCurriculum;
		private $nombre_curri;
		private $idUsuario;

		public function __construct(){
			$this->objetoCurriculum = new Curriculum();
			$this->nombre_curri=isset($_POST['nombre_curri']) ? $_POST['nombre_curri'] : null;
			$this->idUsuario=$_SESSION['idUsuario'];
		}

		public function nombreCurri() {
			
			if ($this->nombre_curri == "") {
				echo "El nombre no puede estar vacio";
			} else {
			
				$guardado=$this->objetoCurriculum->addCurriculum($this->nombre_curri,$this->idUsuario);
				if ($guardado == 1) {
					echo "Nombre guardado correctamente";				
				} else {
					echo "Error al guardar";
				}
			}
		}

		public function listarCurri(){
			$listar=$this->objetoCurriculum->listarCurri($this->idUsuario);
			while ($fila=$listar->fetch_array()) {
				echo '<option value="' . $fila['idCurri']. '">' .$fila['nameCurri']. '</option>';
			}
		}
	}

 ?>