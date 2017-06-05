<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/goku1.jpeg">
    <link rel="stylesheet" type="text/css" href="../view/css/perfil.css"> 
</head>
<body>

    <header>
    <form action="<?PHP $PHP_SELF ?>" method="post">
        <nav id="menu_gral">
      	<ul id="menu">
      		<li><a href=""><input class="btnsBarra" type="submit" name="boton_inicio" value="Inicio"></a></li>

      		<?php 

            if ($_SESSION['tipoUsuario']=='administrador') {
              include('v_perfil_admin.php');
            } elseif ($_SESSION['tipoUsuario']=='usuario') {
              include('v_perfil_usuario.php');
            } else {
              include('v_perfil_consultor.php');
            }
            
          ?>
      		<li><a href=""><input class="btnsBarra" type="submit" name="boton_perfil" value="Perfil"></a>
      			<ul>
              <li><a href=""><input class="btn" type="submit" name="boton_foto" value="Subir Foto"></a></li>
      				<li><a href=""><input class="btn" type="submit" name="boton_modificar" value="Modificar Datos"></a></li>
      				<li><a href=""><input class="btn" type="submit" name="boton_salir" value="Logout"></a></li>
      			</ul>
      		</li>
      	</ul>
      </nav>
      </form>
    </header>

    <div>
    	<hr>
    	<h2>Perfil <?php echo $_SESSION['username']?> </h2>
      
      <?php  

      if (isset($_POST["boton_usuarios"])) {
           //include('../controller/c_mostrarUsuarios.php');
           include('v_mostrarUsuario.php');
         }  

      elseif(isset($_POST["boton_foto"])){  ?>

        <form action="c_perfil.php" method="post" enctype="multipart/form-data">            
         <?php include('v_subirFoto.php');       
         ?>
        </form> 
         <?php
        } elseif (isset($_POST["boton_buscar"])) { ?>
             <form action="" method="post">
              <?php include('v_filtrar.php'); ?>
             </form>
 <?php }

       elseif(isset($_POST["boton_modificar"])){
        ?>
        <form action="c_perfil.php" method="post">            
         <?php include('v_modificarDatos.php'); ?>
        </form> 
         <?php
        } else {
            echo $objetoPerfil->objetoUsuario->getRegistro() . "<br>"; 
            echo "<br>";
            echo $objetoPerfil->objetoUsuario->getName() . " " . $objetoPerfil->objetoUsuario->getSurname() . "<br>";
            echo $objetoPerfil->objetoUsuario->getEmail() . "<br>";
            echo $objetoPerfil->objetoUsuario->getDNI() . "<br>"; 
            echo $objetoPerfil->objetoUsuario->getBirthday() . "<br>";
            echo $objetoPerfil->objetoUsuario->getAddress() . ", " . $objetoPerfil->objetoUsuario->getPostal() . " " . $objetoPerfil->objetoUsuario->getTown() . " " . $objetoPerfil->objetoUsuario->getProvince() . "<br>";
            echo $objetoPerfil->objetoUsuario->getMobile() . "<br>";
            echo $objetoPerfil->objetoUsuario->getTelephone() . "<br>";

       }

      ?>
    </div>

    <footer>
		<hr>
		Copyright &copy; <?php echo date("Y"); ?>
	</footer>
    
	
</body>
</html>