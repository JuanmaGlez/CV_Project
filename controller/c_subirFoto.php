<?php 

	class SubirFoto {

		public $objetoUsuario;


		public function __construct(){
			$this->objetoUsuario=new Usuarios($_SESSION['idUsuario']);
		}

		public function foto() {
			$nombre_imagen=$_FILES['imagen']['name']; //nombre 
			$tipo_imagen=$_FILES['imagen']['type']; // el tipo
			$tamagno_imagen=$_FILES['imagen']['size']; // y el tamaño de la imagen.

			if ($tamagno_imagen<=1000000) { //el tamaño de la imagen debe ser menor que 1mb
				
				if ($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif") {
				
					$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';

					//fx que mueve la imagen de la temporal a la carpeta destino. mv_uploaded_file(filename, destination);
					//Movemos la imagen del directorio temporal al directorio elegido.
					move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
					$this->objetoUsuario->setFoto($nombre_imagen);
				} else {
					echo "Solo se pueden subir imágenes jpeg/jpg/png/gif";
				}

			} else {	
				echo "El tamaño es demasiado grande";
			}
				
		} // Fin Funcion Foto

	} // Fin clase SubirFoto


 ?>