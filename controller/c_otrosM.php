<?php 
	session_start();
	require_once("../model/m_otros.php");

	if (isset($_GET['Id_mo'])) {
        //echo $_GET['Id_ef'];          
    	$idUsuario=$_GET["Id_mo"];
    	//echo $idUsuario;
    	$objetoMOtros = new OtrosDatos($idUsuario);    	
  	}

	require_once("../view/v_modificarOtros.php");
		//echo "hola modificar" . $_POST['actualizar_f'];
		if (isset($_POST['actualizar_o'])) {
			$objetoMOtros->setOtros();
			//echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=5" />';
			?>

			<script type="text/JavaScript" src="../view/js/cerrar.js"></script>
			
			 <?php
		}
		

	

 ?>