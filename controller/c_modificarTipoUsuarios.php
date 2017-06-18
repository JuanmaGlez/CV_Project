<?php 	
  session_start();
	require_once("../model/m_mostrarUsuarios.php");
	
  if (isset($_GET['Id_mt'])) {
        //echo $_GET['Id_ef'];          
    $idUsuario=$_GET["Id_mt"];
    //echo $idUsuario;
    $objetoMTipo = new MostrarUsuario($idUsuario); 
          
  }


  require_once("../view/v_modificarTipo.php");

  //echo "hola modificar" . $_POST['actualizar_f'];
  if (isset($_POST['actualizar_tipo'])) {
    $objetoMTipo->setTipo();
    //echo '<meta http-equiv="refresh" content="0; URL=c_perfil.php?menu=5" />';
  ?>

  <script type="text/JavaScript" src="../view/js/cerrar.js"></script>
  
   <?php
  }

 ?>