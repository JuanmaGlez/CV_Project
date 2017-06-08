<?php 

	require_once("../model/m_perfil.php");

	require_once("../model/m_modificarDatos.php");

	require_once("../model/m_subirFoto.php");

 	require_once('../model/m_mostrarUsuarios.php');	

 	require_once('../model/m_perfil_consultor.php');

  require_once("../model/m_curri.php");

  require_once("../model/m_formacion.php");

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


	require_once("../view/v_perfil.php");

 ?>