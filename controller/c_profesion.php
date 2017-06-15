<?php 

	//require_once("../view/v_perfil_usuario.php");	

	require_once("../model/m_profesion.php");

	$objetoMostrarP = new Profex();

	require_once("../view/v_profesion.php");

	if (isset($_GET['Id_ep'])) {
        //echo $_GET['Id_ep'];          
    	$idUsuario=$_GET["Id_ep"];
    	$objetoMostrarP->dropProfe($idUsuario);
    	echo '<meta http-equiv="refresh" content="2; URL=c_perfil.php?menu=6" />';

  	}

 ?>