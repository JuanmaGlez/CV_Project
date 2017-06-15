<?php 
	session_start();
	require_once("../model/m_formacion.php");

	if (isset($_GET['Id_mf'])) {
        //echo $_GET['Id_ef'];          
    	$idUsuario=$_GET["Id_mf"];
    	//echo $idUsuario;
    	$objetoMFormar = new Formax($idUsuario);    	
  	}

	require_once("../view/v_modificarFormax.php");
		//echo "hola modificar" . $_POST['actualizar_f'];
		if (isset($_POST['actualizar_f'])) {
			$objetoMFormar->setFormar();
			//echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=5" />';
			?>

			<script type="text/JavaScript" src="../view/js/cerrar.js"></script>
			
			 <?php
		}
		

	

 ?>