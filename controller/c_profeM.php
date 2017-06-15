<?php 
	session_start();
	require_once("../model/m_profesion.php");

	if (isset($_GET['Id_mp'])) {
        //echo $_GET['Id_mp'];          
    	$idUsuario=$_GET["Id_mp"];
    	//echo $idUsuario;
    	$objetoMProfe = new Profex($idUsuario);    	
  	}

	require_once("../view/v_modificarProfex.php");
		//echo "hola modificar" . $_POST['actualizar_f'];
		if (isset($_POST['actualizar_p'])) {
			$objetoMProfe->setProfe();
			//echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=5" />';
			?>
		
		<script type="text/JavaScript" src="../view/js/cerrar.js"></script>

			 <?php
		}
		

	

 ?>