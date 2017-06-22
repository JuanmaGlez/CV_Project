<?php 
	session_start();
	require_once("../model/m_curri.php");

	require_once("../model/m_perfil.php");
	require_once("../model/m_formacion.php");
	require_once("../model/m_profesion.php");
	require_once("../model/m_otros.php");
    require_once("../model/m_subirFoto.php");


	$objetoMostrarF = new Formax();

	$objetoMostrarP = new Profex();

	$objetoMostrarO = new OtrosDatos();

    $objetoFoto= new SubirFoto();

	if (isset($_GET['Id_vercurri'])) {
        //echo $_GET['Id_mc'];          
    	$idUsuario=$_GET["Id_vercurri"];
    	//echo $idCurri;
    	$objetoMCurri = new InterCurri();

        $arrayVer=$objetoMCurri->verC($idUsuario);

        if ($arrayVer) {

            foreach ($arrayVer as $Curri) {
                $idCurri=$Curri["idCurri"];
            }
        }

    	//$objetoDatosUsuario = new Perfil();  	
    	$objetoDatosUsuario = new Perfil($a=null,$b=null);  	
  	}

	require_once("../view/v_verCurri.php");
	   
	

 ?>