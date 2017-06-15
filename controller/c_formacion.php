<?php 
	//require_once("../model/m_perfil.php");

	//require_once("../view/v_perfil_usuario.php");	

	require_once("../model/m_formacion.php");

	$objetoMostrarF = new Formax();

	require_once("../view/v_formacion.php");

	if (isset($_GET['Id_ef'])) {
        //echo $_GET['Id_ef'];          
    	$idUsuario=$_GET["Id_ef"];
    	$objetoMostrarF->dropFormar($idUsuario);
    	echo '<meta http-equiv="refresh" content="2; URL=c_perfil.php?menu=5" />';

  	}

 ?>