<?php 

	require_once("../model/m_otros.php");

	$objetoMostrarO = new OtrosDatos();

	require_once("../view/v_otros.php");

	if (isset($_GET['Id_eo'])) {
        //echo $_GET['Id_ef'];          
    	$idUsuario=$_GET["Id_eo"];
    	$objetoMostrarO->dropOtros($idUsuario);
    	echo '<meta http-equiv="refresh" content="2; URL=c_perfil.php?menu=7" />';

  	}

 ?>