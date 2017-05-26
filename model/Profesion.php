<?php 	

	require_once('Conectar.php');

	// Clase de la Profesión del Usuario
	class Profesion {

		// Propiedades de la Clase Profesión
		private $idProfesion;
		private $idCurri;
		private $occupation;
		private $start;
		private $end;
		private $company;
		private $town;
		private $province;
		private $description;
		private $conectado;

		// Constructor
		public function __construct($idProfesion=null) {
			
			$this->conectarse= new Conectar(); //Creamos el objeto de la conexión
			
			$this->conectado=$this->conectarse->conexion(); //realizamos la conexión y la guardamos en una variable

			if($idProfesion != "" || $idProfesion != 0){
        		$this->idProfesion=$idProfesion;
        		$this->recuperar();
      		} //***FIN if***	
		}

		// ** Métodos de la Clase Profesión ** 
		
		// Método recuperar 
		public function recuperar(){

	      $datosArray="SELECT * FROM profesion WHERE idProfesion = $this->idProfesion";	      

	      $datos=$this->conectado->query($datosArray);

	      if($datosRecuperados=$datos->fetch_assoc()){	    

	        $this->idProfesion=$datosRecuperados['idProfesion'];
	        $this->idCurri=$datosRecuperados['idCurri'];
	        $this->occupation=$datosRecuperados['occupation'];
	        $this->start=$datosRecuperados['start'];
	        $this->end=$datosRecuperados['end'];
	        $this->company=$datosRecuperados['company'];	        
	        $this->town=$datosRecuperados['town'];
	        $this->province=$datosRecuperados['province'];	        
	        $this->description=$datosRecuperados['description'];
	        
	      } //***FIN if***

	    } //**** FIN METODO RECUPERAR

	    //Método devolver idProfesion
	    public function getIdProfesion(){

	      return $this->idProfesion;

	    } // Fin getIdProfesion

	    //Método devolver idCurri
	    public function getIdCurri(){

	      return $this->idCurri;

	    } // Fin getIdCurri

	    //Método devolver occupation
	    public function getOccupation(){

	      return $this->occupation;

	    } // Fin getOccupation

	    //Método devolver start
	    public function getStart(){

	      return $this->start;

	    } // Fin getStart

	    //Método devolver end
	    public function getEnd(){

	      return $this->end;

	    } // Fin getEnd

	    //Método devolver company
	    public function getCompany(){

	      return $this->company;

	    } // Fin getCompany

	    //Método devolver town
	    public function getTown(){
	    
	      return $this->town;
	    
	    } // Fin getTown

	    //Método devolver province
	    public function getProvince(){
	      
	      return $this->province;
	    
	    } // Fin getProvince
		
		//Método devolver description
	    public function getDescription(){
	      
	      return $this->description;
	    
	    } // Fin getDescription

	    // Método para insertar Profesión
		public function addProfesion($idCurri,$occupation, $start, $end, $company, $town, $province, $description){
			
			$sql="INSERT INTO profesion (idCurri,occupation, start, end, company, town, province, description) VALUES ('$idCurri','$occupation', '$start', '$end', '$company', '$town', '$province', '$description')";
				
			$resultado=$this->conectado->query($sql);
			
			if ($resultado) {
				
				return 1; // Se creo correctamente
				
			} else {

				return 1; // no se creo correctamente
			
			} // fin del IF ELSE 			

		} // Fin método addProfesion


		//Método Modificar Datos Profesión
	    public function setProfesion($occupation, $start, $end, $company, $town, $province, $description){
	        $modificado=array();
	        if($this->occupation != $occupation){
	            $sql = "UPDATE profesion SET occupation = '$occupation' WHERE idProfesion ='$this->idProfesion'";
	            
	            $modificado['occupation'] = $this->conectado->query($sql);
	        }
	        if($this->start != $start){
	            $sql = "UPDATE profesion set start = '$start' where idProfesion ='$this->idProfesion'";
	            
	            $modificado['start'] = $this->conectado->query($sql);
	        }
	        if($this->end != $end){
	            $sql = "UPDATE profesion set end = '$end' where idProfesion ='$this->idProfesion'";
	            $modificado['end'] = $this->conectado->query($sql);
	        }
	        if($this->company != $company){
	            $sql = "UPDATE profesion set company = '$company' where idProfesion ='$this->idProfesion'";
	            $modificado['company'] = $this->conectado->query($sql);
	        }	        
	        if($this->town != $town){
	            $sql = "UPDATE profesion set town = '$town' where idProfesion ='$this->idProfesion'";
	            $modificado['town'] = $this->conectado->query($sql);
	        }
	        if($this->province != $province){
	            $sql = "UPDATE profesion set province = '$province' where idProfesion ='$this->idProfesion'";
	            $modificado['province'] = $this->conectado->query($sql);
	        }
	        if($this->description != $description){
	            $sql = "UPDATE profesion set description = '$description' where idProfesion ='$this->idProfesion'";
	            $modificado['description'] = $this->conectado->query($sql);
	        }	        
	        if($modificado){	          
	          return 1;
	        } else {	          
	          return 0;
	        }

	    } // Fin método modificar profesión

	    // Método borrar Profesión
	    public function dropProfesion() {
			$sql="DELETE FROM profesion where idProfesion = $this->idProfesion";
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar Profesión


	} // Fin de la Clase Profesión

 ?>