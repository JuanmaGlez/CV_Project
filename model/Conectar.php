<?php 
	/*
 	* @author Juan Manuel González
 	* @version 0.2
 	*
 	* Esta clase nos va a permitir manejar los objetos Conectar
 	*
 	* Clase Conectar
 	* Vamos a realizar con ellas las siguientes acciones:
 	* Conexion a la Base de Datos
 	* Desconexión a la Base de Datos
 	* Consultas a la Base de Datos
	*
 	*/

	class Conectar {

		//Atributos de la clase
		 private $serverlocal;
		 public $login;
  		 public $contrasena;
  		 private $database;
         private $charset;
    	 private $conexion;

		//Constructor de la clase Conectar	
		public function __construct() {
			//Para poder conectarnos, necesitamos los datos de la base de datos, los cuales guardamos en una variable.
			require_once ('../config/db.php');
			$this->serverlocal=SERVERLOCAL;
			$this->login=LOGIN;
			$this->contrasena=CONTRASENA;
			$this->database=DATABASE;
			$this->charset=CHARSET;
			$this->conexion="";
		}

		//Método para crear una conexión a la base de datos		
		public function conexion(){
			try {
				$this->conexion = new mysqli($this->serverlocal, $this->login, $this->contrasena, $this->database);
				$this->conexion->query("SET NAMES '" . $this->charset . "'");
				//echo "Conexion Correcta";
			} catch (Exception $e) {
				die("Error " . $e->getMessage());
				
				echo "Línea del error " . $e->getLine();				
			}

			return $this->conexion;		

		}

		//Método para cerrar la conexión a la base de datos
		public function desconexion() {
			//echo "Desconectado";
			return $this->conexion->close();
		}
	}
	
	/*	
	$prueba = new Conectar();
	$prueba->conexion();
	$prueba->desconexion();
	*/
 ?>