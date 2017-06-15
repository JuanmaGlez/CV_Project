<?php 	

	require_once("../model/m_mostrarUsuarios.php");

	$objetoMostrar = new MostrarUsuario();

	if(isset($_POST["boton_usuarios"])){

		
  		$arrayMostrar=$objetoMostrar->mostrar();

  	}

	require_once("../view/v_mostrarUsuario.php");
	if (isset($_GET['Id_a'])) {
                  
    	$idUsuario=$_GET["Id_a"];
    	$objetoMostrar->activar($idUsuario);
    	echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=8" />';

  	}

  	if (isset($_GET['Id_d'])) {
    
    	$idUsuario=$_GET["Id_d"];
	    $objetoMostrar->desactivar($idUsuario);
      echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=8" />';
  	}

 ?>