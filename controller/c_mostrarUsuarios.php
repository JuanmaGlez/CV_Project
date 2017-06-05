<?php 

	require_once("../view/v_perfil_admin.php");

	require_once("../model/m_mostrarUsuarios.php");

	$objetoMostrar = new MostrarUsuario();

	if(isset($_POST["boton_usuarios"])){

		
  		$arrayMostrar=$objetoMostrar->mostrar();

  	}

	require_once("../view/v_mostrarUsuario.php");

 ?>