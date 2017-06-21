<?php 	

	require_once('Conectar.php');

	// Clase Curriculum 
	class Curriculum {

		// Propiedades de la Clase Curriculum
		private $idCurri;		
		private $name;
		private $idUsuario;
		private $conectarse;
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
	        $this->name=$datosRecuperados['nameCurri'];
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

	     // Método de volver todos los Curriculum del usuario
		public function getCurriculum($idUsuario) {
			$curriculums="";
			$this->paginar($idUsuario);
			
			$sql="SELECT * FROM curriculum where idUsuario = $idUsuario ORDER BY idCurri desc LIMIT $this->empezar_desde, $this->tamano_paginas";
			//echo $sql;
			//$sql="SELECT * FROM curriculum LIMIT $this->empezar_desde, $this->tamano_paginas";
			$resultado=$this->conectado->query($sql);
			if ($resultado) {				
				while ($filas=$resultado->fetch_assoc()) {
					$curriculums[]=$filas;
				}
				if (!$curriculums) {
					//echo "No hay na";
					return 0;
				} else {
					return $curriculums;
				}
			} else {
				return 0;
			}
			$this->conectarse->desconexion();
		} // Fin método devolver usuarios

		public function paginar($idUsuario) {
	    	$this->tamano_paginas=8;

      		if (isset($_GET["pagina"])) {
      
        		if ($_GET["pagina"]==1) {
          			header("location:c_perfil.php?menu=4");
        		} else {
          			$pagina=$_GET["pagina"];
        		}

      		} else {
        		$pagina=1;
      		}

      	    //variable que guarda el valor inicial que debe mostrar la página.
      		$this->empezar_desde=($pagina-1)*$this->tamano_paginas;

      		$sql_total="SELECT * FROM curriculum WHERE idUsuario = $idUsuario"; //limit admite dos datos, el primero seria cual es el primero que quieres ver, y el segundo es hasta cuanto quieres ver. En este caso tb se puede poner LIMIT 3.

      		$resultado=$this->conectado->query($sql_total);

	    	//variables que guarda el números de filas que nos devuelve la consulta en total.
	    	$num_filas=$resultado->num_rows;

			//variable que guarda el número de páginas total que vamos a tener.
	     	//la fx ceil redondea a la alza.
	     	$total_paginas=ceil($num_filas/$this->tamano_paginas);
	     	define("TOTAL_PAGINAS", "$total_paginas");
	    	//$total_paginas=ceil($num_filas/$this->tamano_paginas);
	    } // Fin método paginar


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
	    	//echo  $name . " " . $this->name . "<br>";
	        $modificado=array();
	        if($this->name != $name){
	            $sql = "UPDATE curriculum SET nameCurri = '$name' WHERE idCurri = $this->idCurri";
	            //echo $sql . "<br>";
	            $modificado['name'] = $this->conectado->query($sql);
	        }	        	        
	        if($modificado){
	         
	          return 1;
	        } else {
	         
	          return 0;
	        }
	    } // Fin método modificar Curriculum

	    // Método borrar Curriculum
	    public function dropCurriculum($idCurri) {
			$sql="DELETE FROM curriculum where idCurri = $idCurri";
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar Curriculum        

	    public function verCurri($idUsuario){
	    	$ver="";

	    	$sql="Select * from curriculum where idCurri = (SELECT min(idCurri) from curriculum where idUsuario = $idUsuario)";
	    	//echo $sql;
	    	$resultado=$this->conectado->query($sql);
			if ($resultado) {				
				while ($filas=$resultado->fetch_assoc()) {
					$ver[]=$filas;
				}
				if (!$ver) {
					//echo "No hay na";
					return 0;
				} else {
					return $ver;
				}
			} else {
				return 0;
			}
			$this->conectarse->desconexion();
	    }


	} // Fin de la Clase Curriculum

 ?>