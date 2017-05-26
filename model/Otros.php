<?php 	

	require_once('Conectar.php');

	// Clase de la Otros del Usuario
	class otros {

		// Propiedades de la Clase Otros
		private $idOtros;
		private $idCurri;
		private $lenguage;
		private $card;
		private $ability;
		private $knowledge;
		private $hobby;		
		private $conectado;

		// Constructor
		public function __construct($idOtros=null) {
			
			$this->conectarse= new Conectar(); //Creamos el objeto de la conexión
			
			$this->conectado=$this->conectarse->conexion(); //realizamos la conexión y la guardamos en una variable

			if($idOtros != "" || $idOtros != 0){
        		$this->idOtros=$idOtros;
        		$this->recuperar();
      		} //***FIN if***	
		}

		// ** Métodos de la Clase Otros ** 
		
		// Método recuperar 
		public function recuperar(){

	      $datosArray="SELECT * FROM otros WHERE idOtros = $this->idOtros";	      

	      $datos=$this->conectado->query($datosArray);

	      if($datosRecuperados=$datos->fetch_assoc()){	    

	        $this->idOtros=$datosRecuperados['idOtros'];
	        $this->idCurri=$datosRecuperados['idCurri'];
	        $this->occupation=$datosRecuperados['occupation'];
	        $this->lenguage=$datosRecuperados['lenguage'];
	        $this->card=$datosRecuperados['card'];
	        $this->ability=$datosRecuperados['ability'];	        
	        $this->knowledge=$datosRecuperados['knowledge'];
	        $this->hobby=$datosRecuperados['hobby'];	        	        
	        
	      } //***FIN if***

	    } //**** FIN METODO RECUPERAR

	    //Método devolver idOtros
	    public function getIdOtros(){

	      return $this->idOtros;

	    } // Fin getIdOtros

	    //Método devolver idCurri
	    public function getIdCurri(){

	      return $this->idCurri;

	    } // Fin getIdCurri

	    //Método devolver lenguage
	    public function getLenguage(){

	      return $this->lenguage;

	    } // Fin getLenguage

	    //Método devolver card
	    public function getCard(){

	      return $this->card;

	    } // Fin getCard

	    //Método devolver ability
	    public function getAbility(){

	      return $this->ability;

	    } // Fin getAbility

	    //Método devolver knowledge
	    public function getKnowledge(){
	    
	      return $this->knowledge;
	    
	    } // Fin getKnowledge

	    //Método devolver hobby
	    public function getHobby(){
	      
	      return $this->hobby;
	    
	    } // Fin getHobby
		
	    // Método para insertar Otros
		public function addOtros($idCurri,$occupation, $lenguage, $card, $ability, $knowledge, $hobby){
			
			$sql="INSERT INTO otros (idCurri,occupation, lenguage, card, ability, knowledge, hobby, description) VALUES ('$idCurri','$occupation', '$lenguage', '$card', '$ability', '$knowledge', '$hobby', '$description')";
				
			$resultado=$this->conectado->query($sql);
			
			if ($resultado) {
				
				return 1; // Se creo correctamente
				
			} else {

				return 1; // no se creo correctamente
			
			} // fin del IF ELSE 			

		} // Fin método addOtros


		//Método Modificar Datos Otros
	    public function setOtros($occupation, $lenguage, $card, $ability, $knowledge, $hobby){
	        $modificado=array();
	        if($this->lenguage != $lenguage){
	            $sql = "UPDATE otros set lenguage = '$lenguage' where idOtros ='$this->idOtros'";
	            
	            $modificado['lenguage'] = $this->conectado->query($sql);
	        }
	        if($this->card != $card){
	            $sql = "UPDATE otros set card = '$card' where idOtros ='$this->idOtros'";
	            $modificado['card'] = $this->conectado->query($sql);
	        }
	        if($this->ability != $ability){
	            $sql = "UPDATE otros set ability = '$ability' where idOtros ='$this->idOtros'";
	            $modificado['ability'] = $this->conectado->query($sql);
	        }	        
	        if($this->knowledge != $knowledge){
	            $sql = "UPDATE otros set knowledge = '$knowledge' where idOtros ='$this->idOtros'";
	            $modificado['knowledge'] = $this->conectado->query($sql);
	        }
	        if($this->hobby != $hobby){
	            $sql = "UPDATE otros set hobby = '$hobby' where idOtros ='$this->idOtros'";
	            $modificado['hobby'] = $this->conectado->query($sql);
	        }
	              
	        if($modificado){	          
	          return 1;
	        } else {	          
	          return 0;
	        }

	    } // Fin método modificar Otros

	    // Método borrar Otros
	    public function dropOtros() {
			$sql="DELETE FROM otros where idOtros = $this->idOtros";
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar Otros


	} // Fin de la Clase Otros

 ?>