<?php 
	session_start();
	require_once("../model/m_curri2.php");

	if (isset($_GET['Id_mc'])) {
        //echo $_GET['Id_mc'];          
    	$idUsuario=$_GET["Id_mc"];
    	//echo $idUsuario;
    	$objetoMCurri = new InterCurri($idUsuario);    	
  	}

	require_once("../view/v_modificarCurri.php");
		//echo "hola modificar" . $_POST['actualizar_f'];
		if (isset($_POST['actualizar_c'])) {
			$objetoMCurri->setCurri();
			//echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=5" />';
			?>

			<script type="text/JavaScript" src="../view/js/cerrar.js"></script>
			
			 <?php
		}
		

	

 ?>