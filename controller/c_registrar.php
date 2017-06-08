<?php 

	require_once("../model/m_registrar.php");

	   if (isset($_POST["submit"])) {

        $objetoRegistrar=new Registrar(); 
        $objetoRegistrar->insertar();
    }

	require_once("../view/v_registrar.php");

 ?>
