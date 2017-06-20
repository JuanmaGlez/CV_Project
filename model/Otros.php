<?php 	

	require_once('Conectar.php');

	// Clase de la Otros del Usuario
	class Otros {

		// Propiedades de la Clase Otros
		private $idOtros;
		private $idCurri;
		private $lenguage;
		private $card;
		private $ability;
		private $knowledge;
		private $hobby;		
		private $conectarse;
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

	    public function getOtrox($idCurri) {
			$otros="";
						
			$sql="SELECT * FROM otros where idCurri = $idCurri";
			//echo $sql;
			//$sql="SELECT * FROM formacion LIMIT $this->empezar_desde, $this->tamano_paginas";
			$resultado=$this->conectado->query($sql);
			if ($resultado) {				
				while ($filas=$resultado->fetch_assoc()) {
					$otros[]=$filas;
				}
				if (!$otros) {
					//echo "No hay na";
					return 0;
				} else {
					return $otros;
				}
			} else {
				return 0;
			}
			$this->conectarse->desconexion();
		} // Fin método devolver usuarios

	      // Método de volver toda la formación del usuario
		public function getOtros($idUsuario) {
			$otros="";
			$this->paginar();
			//SELECT * FROM formacion where idCurri = (select idCurri from curriculum where idUsuario = 8);
			$sql="SELECT * FROM otros where idCurri in (select idCurri from curriculum where idUsuario = $idUsuario) LIMIT $this->empezar_desde, $this->tamano_paginas";
			//echo $sql;
			//$sql="SELECT * FROM formacion LIMIT $this->empezar_desde, $this->tamano_paginas";
			$resultado=$this->conectado->query($sql);
			if ($resultado) {				
				while ($filas=$resultado->fetch_assoc()) {
					$otros[]=$filas;
				}
				if (!$otros) {
					//echo "No hay na";
					return 0;
				} else {
					return $otros;
				}
			} else {
				return 0;
			}
			$this->conectarse->desconexion();
		} // Fin método devolver usuarios

		public function paginar() {
	    	$this->tamano_paginas=8;

      		if (isset($_GET["pagina"])) {
      
        		if ($_GET["pagina"]==1) {
          			header("location:c_perfil.php?menu=7");
        		} else {
          			$pagina=$_GET["pagina"];
        		}

      		} else {
        		$pagina=1;
      		}

      	    //variable que guarda el valor inicial que debe mostrar la página.
      		$this->empezar_desde=($pagina-1)*$this->tamano_paginas;

      		$sql_total="SELECT * FROM otros"; //limit admite dos datos, el primero seria cual es el primero que quieres ver, y el segundo es hasta cuanto quieres ver. En este caso tb se puede poner LIMIT 3.

      		$resultado=$this->conectado->query($sql_total);

	    	//variables que guarda el números de filas que nos devuelve la consulta en total.
	    	$num_filas=$resultado->num_rows;

			//variable que guarda el número de páginas total que vamos a tener.
	     	//la fx ceil redondea a la alza.
	     	$total_paginas=ceil($num_filas/$this->tamano_paginas);
	     	define("TOTAL_PAGINAS", "$total_paginas");
	    	//$total_paginas=ceil($num_filas/$this->tamano_paginas);
	    } // Fin método paginar
		
	    // Método para insertar Otros
		public function addOtros($idCurri,$lenguage, $card, $ability, $knowledge, $hobby){
			
			$sql="INSERT INTO otros (idCurri,lenguage, card, ability, knowledge, hobby, description) VALUES ($idCurri,'$lenguage', '$card', '$ability', '$knowledge', '$hobby')";
				
			$resultado=$this->conectado->query($sql);
			
			if ($resultado) {
				
				return 1; // Se creo correctamente
				
			} else {

				return 1; // no se creo correctamente
			
			} // fin del IF ELSE 			

		} // Fin método addOtros


		//Método Modificar Datos Otros
	    public function setOtrox($lenguage, $card, $ability, $knowledge, $hobby){
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
	    public function dropOtros($idOtros) {
			$sql="DELETE FROM otros where idOtros = $idOtros";
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar Otros


	} // Fin de la Clase Otros

 ?>