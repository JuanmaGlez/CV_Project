<?php 
	
	//require_once("../view/v_perfil_usuario.php");

	require_once("../model/m_curri.php");

	$objetoCurri = new InterCurri();

	require_once("../view/v_curriculum.php");

	if (isset($_GET['Id_ec'])) {
        //echo $_GET['Id_ec'];          
    	$idUsuario=$_GET["Id_ec"];
    	$objetoCurri->dropCurri($idUsuario);
    	echo '<meta http-equiv="refresh" content="2; URL=c_perfil.php?menu=4" />';

  	}
	

 ?>