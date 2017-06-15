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
 

  $objetoCurri = new InterCurri();


  $objetoFormacion = new Formax();
 

  $objetoProfesion = new Profex();
  
  

	require_once("../view/v_perfil.php");

  if (isset($_GET['menu'])) {     
     
          if ($_GET['menu']== 0) {
            include("../view/v_mostrarDatos.php");            
          } elseif ($_GET['menu']== 1) { ?>
            <form action="" method="post" enctype="multipart/form-data">            
              <?php include('../view/v_subirFoto.php'); ?>
            </form> 
            
<?php    }  elseif ($_GET['menu']==2) { ?>

              <form action="c_perfil.php?menu=0" method="post">            
                <?php include('../view/v_modificarDatos.php'); ?>
              </form> 
<?php     }  elseif ($_GET['menu']==3) { 
            $objetoPerfil->closeSession();
          }  elseif ($_GET['menu']== 4) { ?>
            <form action="" method="post">
              <?php include('../controller/c_curri.php'); 
               if (isset($_POST['guardar_curri'])) {
                  $objetoCurri->nombreCurri(); 
                  header("location: c_perfil.php?menu=4");
               } ?>
            </form>             
<?php     } elseif ($_GET['menu']==5) { ?>
             <form action="" method="post">
                <?php include('../controller/c_formacion.php');
                  if (isset($_POST['insertar_formacion'])) {
                    $objetoFormacion->addFormacion($_POST['For'],$_POST['Inicio'],$_POST['Fin'],$_POST['Cent'],$_POST['Pue'],$_POST['Pro'],$_POST['Notas']);
                  } ?>
             </form>                
<?php     }  elseif ($_GET['menu']==6) { ?>
              <form action="" method="post">
                <?php include('../controller/c_profesion.php'); 
                if (isset($_POST['insertar_profesion'])) {
                   $objetoProfesion->addProfesion($_POST['Prof'],$_POST['Inicio'],$_POST['Fin'],$_POST['Emp'],$_POST['Pue'],$_POST['Pro'],$_POST['Desc']);
                } ?>   
              </form> 

<?php     } elseif ($_GET['menu']==7) { 
              include('../controller/c_otros.php');

          } elseif ($_GET['menu']==8) {  ?>
              <form action="c_perfil.php?menu=8" method="post"> 
           <?php   include('../controller/c_mostrarUsuarios.php');
              if (isset($_POST['insertar_nuevo'])) {
                 $objetoMostrar->addUser($_POST['Usu'],$_POST['Email'],$_POST['Tipo'],$_POST['Estado']);
                 
                 //header("location: c_perfil2.php?menu=8");
              } ?>
             </form>               
<?php     } elseif ($_GET['menu']==9) { 
              include('../controller/c_otros.php');

          } elseif ($_GET['menu']==10) { ?>
            <form action="" method="post">
              <?php include('../controller/c_filtrar.php'); ?>
             </form>
<?php     }

  } else {
    $_GET['menu']=0;  
     
    if ($_GET['menu']== 0) {
      include("../view/v_mostrarDatos.php");            
    }
  }  

  require_once("../view/v_footer.php");

 ?>