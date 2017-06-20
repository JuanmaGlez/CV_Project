<?php 
	session_start();
	require_once("../model/m_curri.php");

	require_once("../model/m_perfil.php");
	require_once("../model/m_formacion.php");
	require_once("../model/m_profesion.php");
	require_once("../model/m_otros.php");

	$objetoMostrarF = new Formax();

	$objetoMostrarP = new Profex();

	$objetoMostrarO = new OtrosDatos();

	if (isset($_GET['Id_rc'])) {
        //echo $_GET['Id_mc'];          
    	$idCurri=$_GET["Id_rc"];
    	//echo $idCurri;
    	$objetoMCurri = new InterCurri($idCurri);  
    	//$objetoDatosUsuario = new Perfil();  	
    	$objetoDatosUsuario = new Perfil($_SESSION['username']=null,$_SESSION['pass']=null);  	
  	}

	require_once("../view/v_rellenarCurri.php");

	 if (isset($_POST['insertar_formacion'])) {
          $objetoMostrarF->addFormacion($idCurri,$_POST['For'],$_POST['Inicio'],$_POST['Fin'],$_POST['Cent'],$_POST['Pue'],$_POST['Pro'],$_POST['Notas']);
     }

     if (isset($_POST['insertar_profesion'])) {
         $objetoMostrarP->addProfesion($idCurri,$_POST['Prof'],$_POST['Inicio'],$_POST['Fin'],$_POST['Emp'],$_POST['Pue'],$_POST['Pro'],$_POST['Desc']);
     }   

     echo "aqui 1";
     if (isset($_POST['insertar_otros'])) {
     	echo "aqui 2";
         $objetoMostrarO->addOtros($idCurri,$_POST['idi'],$_POST['card'],$_POST['abi'],$_POST['know'],$_POST['hob']);
     }   
	

 ?>