<?php 
  
  // Llamamos a la Clase Perfil que esta en controller
  //require_once ("../controller/c_perfil.php");

    /*if (isset($_COOKIE["nombre_usuario"])) {
      echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
    }*/

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Curriculum</title>
    <link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/muneco.png">
    <link rel="stylesheet" type="text/css" href="../view/css/login.css">    
  </head>
  <body>
    <header>
      <h1>CURRICULUM</h1>
    </header>
    <hr>
    <div class="login">
        <form action="<?PHP $PHP_SELF?>" method="post">
          <table>
            <tr>
              <td><label for="nombre">Usuario: </label></td>
              <td><input type="text" name="username" id="username" placeholder="usuario"
                size="8" maxlengh="10" class="form-control" required></td>
            </tr>
            <tr>
              <td><label for="pass">Contraseña: </label></td>
              <td><input type="password" name="password" id="password"
                placeholder="contraseña" size="8" maxlengh="10" required></td>
            </tr>
            <tr>
            <td class="izq">Recordar:</td>
            <td class="der"><input type="checkbox" name="recordar"><label for="recordar"></label> 
        </td>
      </tr>
            <tr>
              <td colspan="2" id="centrar">
                <input type="submit" name="entrar" value="Entrar">
              </td><td></td>
            </tr>
          </table>
        </form>
        <p>
          Si ha olvidado la contraseña pulse <a href="c_recuperarpass.php" target="_blank">aquí</a>
        </p>
    </div>

    <?php         

        //Condicional para cuando el usuario pulse el botón entrar
        if(isset($_POST["entrar"])){
          $objetoVerificarLogin=new Perfil($_POST['username'],$_POST['password']);
          $objetoVerificarLogin->checkLogin();
          if (isset($_POST['recordar'])) {
            $objetoVerificarLogin->guardarLogin($_POST['username']); 
          }
        }


     ?>

    <footer class="col-lg-12">
      <hr/>
      Copyright &copy; <?php echo  date("Y"); ?>
    </footer>

  </body>
</html>
