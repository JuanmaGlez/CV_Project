<?php 	

	require_once('Conectar.php');

	// Clase Curriculum 
	class Curriculum {

		// Propiedades de la Clase Curriculum
		private $idCurri;		
		private $name;
		private $idUsuario;
		private $conectado;

		// Constructor
		public function __construct($idCurri=null) {
			
			$this->conectarse= new Conectar(); //Creamos el objeto de la conexión
			
			$this->conectado=$this->conectarse->conexion(); //realizamos la conexión y la guardamos en una variable

			if($idCurri != "" || $idCurri != 0){
        		$this->idCurri=$idCurri;
        		$this->recuperar();
      		} //***FIN if***	
		}

		// ** Métodos de la Clase Curriculum ** 
		
		// Método recuperar 
		public function recuperar(){

	      $datosArray="SELECT * FROM curriculum WHERE idCurri = $this->idCurri";	      

	      $datos=$this->conectado->query($datosArray);

	      if($datosRecuperados=$datos->fetch_assoc()){	    

	        $this->idCurri=$datosRecuperados['idCurri'];	        
	        $this->name=$datosRecuperados['name'];
	        $this->idUsuario=$datosRecuperados['idUsuario'];
	        	        
	      } //***FIN if***

	    } //**** FIN METODO RECUPERAR

	    //Método devolver idCurri
	    public function getIdCurri(){

	      return $this->idCurri;

	    } // Fin getIdCurri

	    //Método devolver name
	    public function getName(){

	      return $this->name;

	    } // Fin getName

	    //Método devolver idUsuario
	    public function getIdUsuario(){

	      return $this->idUsuario;

	    } // Fin getIdUsuario

	    // Método para insertar Curriculum
		public function addCurriculum($name, $idUsuario){
			
			$sql="INSERT INTO curriculum (nameCurri, idUsuario) VALUES ('$name', $idUsuario)";
			//echo $sql;
				
			$resultado=$this->conectado->query($sql);
			
			if ($resultado) {
				
				return 1; // Se creo correctamente
				
			} else {

				return 0; // no se creo correctamente
			
			} // fin del IF ELSE 			

		} // Fin método addcurriculum


		//Método Modificar Datos Curriculum
	    public function setCurriculum($name){
	        $modificado=array();
	        if($this->name != $name){
	            $sql = "UPDATE curriculum SET name = '$name' WHERE idCurri = $this->idCurri";
	            
	            $modificado['name'] = $this->conectado->query($sql);
	        }	        	        
	        if($modificado){
	         
	          return 1;
	        } else {
	         
	          return 0;
	        }
	    } // Fin método modificar Curriculum

	    // Método borrar Curriculum
	    public function dropCurriculum() {
			$sql="DELETE FROM curriculum where idCurri = $this->idCurri and idUsuario = $idUsuario";
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar Curriculum

	    // Método listarCurri
	    public function listarCurri($idUsuario){
	    	$sql = "SELECT * FROM curriculum where idUsuario = $idUsuario";
	    	$lista = $this->conectado->query($sql);
	    	return $lista;
	    }


	} // Fin de la Clase Curriculum

 ?>