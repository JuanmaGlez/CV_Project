<?php 	

	require_once('Conectar.php');

	// Clase de la Formación del Usuario
	class Formacion {

		// Propiedades de la Clase Formación
		private $idFormacion;
		private $idCurri;
		private $formation;
		private $start;
		private $end;
		private $studyCenter;
		private $town;
		private $province;
		private $grade;
		private $conectado;

		// Constructor
		public function __construct($idFormacion=null) {
			//echo "$idFormacion";
			$this->conectarse= new Conectar(); //Creamos el objeto de la conexión
			
			$this->conectado=$this->conectarse->conexion(); //realizamos la conexión y la guardamos en una variable

			if($idFormacion != "" || $idFormacion != 0){
        		$this->idFormacion=$idFormacion;
        		$this->recuperar();
      		} //***FIN if***	
		}

		// ** Métodos de la Clase Formación ** 
		
		// Método recuperar 
		public function recuperar(){

	      $datosArray="SELECT * FROM formacion WHERE idFormacion = $this->idFormacion";	      

	      $datos=$this->conectado->query($datosArray);

	      if($datosRecuperados=$datos->fetch_assoc()){	    

	        $this->idFormacion=$datosRecuperados['idFormacion'];
	        $this->idCurri=$datosRecuperados['idCurri'];
	        $this->formation=$datosRecuperados['formation'];
	        $this->start=$datosRecuperados['start'];
	        $this->end=$datosRecuperados['end'];
	        $this->studyCenter=$datosRecuperados['studyCenter'];	        
	        $this->town=$datosRecuperados['town'];
	        $this->province=$datosRecuperados['province'];	        
	        $this->grade=$datosRecuperados['grade'];
	        
	      } //***FIN if***

	    } //**** FIN METODO RECUPERAR

	    //Método devolver idFormacion
	    public function getIdFormacion(){

	      return $this->idFormacion;

	    } // Fin getIdFormacion

	    //Método devolver idCurri
	    public function getIdCurri(){

	      return $this->idCurri;

	    } // Fin getIdCurri

	    //Método devolver formation
	    public function getFormation(){

	      return $this->formation;

	    } // Fin getFormation

	    //Método devolver start
	    public function getStart(){

	      return $this->start;

	    } // Fin getStart

	    //Método devolver end
	    public function getEnd(){

	      return $this->end;

	    } // Fin getEnd

	    //Método devolver studyCenter
	    public function getStudyCenter(){
	    	//echo "aqui llego" . $this->studyCenter;
	      return $this->studyCenter;

	    } // Fin getStudyCenter

	    //Método devolver town
	    public function getTown(){
	    
	      return $this->town;
	    
	    } // Fin getTown

	    //Método devolver province
	    public function getProvince(){
	      
	      return $this->province;
	    
	    } // Fin getProvince
		
		//Método devolver grade
	    public function getGrade(){
	      
	      return $this->grade;
	    
	    } // Fin getGrade

	    // Método de volver toda la formación del usuario
		public function getFormacion($idUsuario) {
			$formaciones="";
			$this->paginar();
			//SELECT * FROM formacion where idCurri = (select idCurri from curriculum where idUsuario = 8);
			$sql="SELECT * FROM formacion where idCurri in (select idCurri from curriculum where idUsuario = $idUsuario) LIMIT $this->empezar_desde, $this->tamano_paginas";
			//echo $sql;
			//$sql="SELECT * FROM formacion LIMIT $this->empezar_desde, $this->tamano_paginas";
			$resultado=$this->conectado->query($sql);
			if ($resultado) {				
				while ($filas=$resultado->fetch_assoc()) {
					$formaciones[]=$filas;
				}
				if (!$formaciones) {
					//echo "No hay na";
					return 0;
				} else {
					return $formaciones;
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
          			header("location:c_perfil.php?menu=5");
        		} else {
          			$pagina=$_GET["pagina"];
        		}

      		} else {
        		$pagina=1;
      		}

      	    //variable que guarda el valor inicial que debe mostrar la página.
      		$this->empezar_desde=($pagina-1)*$this->tamano_paginas;

      		$sql_total="SELECT * FROM formacion"; //limit admite dos datos, el primero seria cual es el primero que quieres ver, y el segundo es hasta cuanto quieres ver. En este caso tb se puede poner LIMIT 3.

      		$resultado=$this->conectado->query($sql_total);

	    	//variables que guarda el números de filas que nos devuelve la consulta en total.
	    	$num_filas=$resultado->num_rows;

			//variable que guarda el número de páginas total que vamos a tener.
	     	//la fx ceil redondea a la alza.
	     	$total_paginas=ceil($num_filas/$this->tamano_paginas);
	     	define("TOTAL_PAGINAS", "$total_paginas");
	    	//$total_paginas=ceil($num_filas/$this->tamano_paginas);
	    } // Fin método paginar

	    // Método para insertar formación
		public function addFormacion($formation, $start, $end, $studyCenter, $town, $province, $grade){
			
			$sql="INSERT INTO formacion (formation,start,end,studyCenter,town,province,grade) VALUES ('$formation', '$start','$end','$studyCenter','$town','$province','$grade')";
				
			$resultado=$this->conectado->query($sql);
			
			if ($resultado) {
				
				return 1; // Se creo correctamente
				
			} else {

				return 0; // no se creo correctamente
			
			} // fin del IF ELSE 			

		} // Fin método addFormacion


		//Método Modificar Datos Formación
	    public function setFormacion($formation, $start, $end, $studyCenter, $town, $province, $grade){
	        $modificado=array();
	        if($this->formation != $formation){
	            $sql = "UPDATE formacion SET formation = '$formation' WHERE idFormacion ='$this->idFormacion'";
	            
	            $modificado['formation'] = $this->conectado->query($sql);
	        }
	        if($this->start != $start){
	            $sql = "UPDATE formacion set start = '$start' where idFormacion ='$this->idFormacion'";
	            
	            $modificado['start'] = $this->conectado->query($sql);
	        }
	        if($this->end != $end){
	            $sql = "UPDATE formacion set end = '$end' where idFormacion ='$this->idFormacion'";
	            $modificado['end'] = $this->conectado->query($sql);
	        }
	        if($this->studyCenter != $studyCenter){
	            $sql = "UPDATE formacion set studyCenter = '$studyCenter' where idFormacion ='$this->idFormacion'";
	            $modificado['studyCenter'] = $this->conectado->query($sql);
	        }	        
	        if($this->town != $town){
	            $sql = "UPDATE formacion set town = '$town' where idFormacion ='$this->idFormacion'";
	            $modificado['town'] = $this->conectado->query($sql);
	        }
	        if($this->province != $province){
	            $sql = "UPDATE formacion set province = '$province' where idFormacion ='$this->idFormacion'";
	            $modificado['province'] = $this->conectado->query($sql);
	        }
	        if($this->grade != $grade){
	            $sql = "UPDATE formacion set grade = '$grade' where idFormacion ='$this->idFormacion'";
	            $modificado['grade'] = $this->conectado->query($sql);
	        }	        
	        if($modificado){
	          //echo "Los datos has sido modificados correctamente";
	          //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
	          return 1;
	        } else {
	          //echo "No se ha modificado ningún dato";
	          return 0;
	        }
	    } // Fin método modificar formación

	    // Método borrar formación
	    public function dropFormacion($idFormacion) {
			$sql="DELETE FROM formacion where idFormacion = $idFormacion";
			//echo $sql;
			$borrar=$this->conectado->query($sql);
			if ($borrar) {
				return 1;    	
			} 
	    } // Fin método borrar formación


	} // Fin de la Clase Formación

 ?>