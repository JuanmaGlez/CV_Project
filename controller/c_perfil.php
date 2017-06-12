<?php 

	require_once("../model/m_perfil.php");

	require_once("../model/m_modificarDatos.php");

	require_once("../model/m_subirFoto.php");

 	require_once('../model/m_mostrarUsuarios.php');	

 	require_once('../model/m_perfil_consultor.php');

  require_once("../model/m_curri.php");

  require_once("../model/m_formacion.php");

  require_once("../model/m_profesion.php");

  	$objetoPerfil = new Perfil($_POST['username']=null,$_POST['password']=null);
  
  	$objetoPerfil->checkConexion();
  
  if(isset($_POST["boton_salir"])){
    $objetoPerfil->closeSession();
  }
  
  $objetoModificar =new ModificarDatos();
  

  if(isset($_POST["actualizar"])){
    $objetoModificar->checkModificar();
  }

  $objetoFoto= new SubirFoto();

  if (isset($_POST["Enviar_Imagen"])) {

    $objetoFoto->foto();
  }

  $objetoMostrar = new MostrarUsuario();
  //$arrayMostrar=$objetoMostrar->mostrar(); 
  if (isset($_GET['Id_a'])) {
    $idUsuario=$_GET["Id_a"];
    $objetoMostrar->activar($idUsuario);
   
  }

  if (isset($_GET['Id_d'])) {
    $idUsuario=$_GET["Id_d"];
    
    $objetoMostrar->desactivar($idUsuario);
  }

  if (isset($_POST['insertar_nuevo'])) {
    $objetoMostrar->addUser($_POST['Usu'],$_POST['Email'],$_POST['Tipo'],$_POST['Estado']);
  }

  $objetoFiltrar=new Filtrarlos();
  
  if (isset($_POST['envio_filtrar'])) {
    $objetoFiltrar->mostrarFiltro();  
  }

  $objetoCurri = new InterCurri();

  if (isset($_POST['guardar_curri'])) {
    $objetoCurri->nombreCurri();
  }

  $objetoFormacion = new Formax();
  
  if (isset($_POST['insertar_formacion'])) {
    $objetoFormacion->addFormacion($_POST['For'],$_POST['Inicio'],$_POST['Fin'],$_POST['Cent'],$_POST['Pue'],$_POST['Pro'],$_POST['Notas']);
  }

  $objetoProfesion = new Profex();
  
  if (isset($_POST['insertar_profesion'])) {
    $objetoProfesion->addProfesion($_POST['Prof'],$_POST['Inicio'],$_POST['Fin'],$_POST['Emp'],$_POST['Pue'],$_POST['Pro'],$_POST['Desc']);
  }

	require_once("../view/v_perfil.php");

 ?>