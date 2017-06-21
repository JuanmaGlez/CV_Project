<?php 

	require_once("../model/m_otros.php");

	$objetoMostrarO = new OtrosDatos();

	require_once("../view/v_otros.php");

	if (isset($_GET['Id_eo'])) {
        
    	$idOtros=$_GET["Id_eo"];
    	$objetoMostrarO->dropOtro($idOtros);
    	echo '<meta http-equiv="refresh" content="2; URL=c_perfil.php?menu=7" />';

  	}

 ?>