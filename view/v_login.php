<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Curriculum</title>
    <link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/muneco.png">
    <link rel="stylesheet" type="text/css" href="../view/css/login.css"> 
     <link rel="stylesheet" type="text/css" href="../view/css/reloj.css"> 
        <script type="text/JavaScript" src="../view/js/reloj.js"></script>   
  </head>
  <body onload="mueveReloj()">
    <header>
      <table>
        <tr>
          <td>
              <h1>CURRICULUM</h1>          
          </td>
          <td>
              <div class=de_reloj>
                <form name="form_reloj">
                  <input class="reloj" type="text" name="reloj" size="10" onfocus="window.document.form_reloj.reloj.blur()">
                </form>
              </div> 
          </td>
        </tr>
      </table>
  
    </header>
    <hr>
    <div class="login">
        <form action="<?PHP $PHP_SELF?>" method="post">
          <table>
            <tr>
              <td><label for="nombre">Usuario: </label></td>
              <?php
               if (isset($_COOKIE["nombre_usuario"])) {
                  //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../view/v_perfil.php\">";
              ?><td><input type="text" name="username" id="username" value="<?php echo $_COOKIE['nombre_usuario']; ?>" size="8" maxlengh="10" class="form-control" required></td>
    <?php } else { ?>
              <td><input type="text" name="username" id="username" placeholder="usuario"
                size="8" maxlengh="10" class="form-control" required></td>
                <?php } ?>
            </tr>
            <tr>
              <td><label for="pass">Contraseña: </label></td>
              <?php
               if (isset($_COOKIE["nombre_usuario"])) {                
              ?><td><input type="password" name="password" id="password" 
              value="<?php echo $_COOKIE["password_usuario"]; ?>"  size="8" maxlengh="10" required></td>
              <?php } else { ?>
              <td><input type="password" name="password" id="password"
                placeholder="contraseña" size="8" maxlengh="10" required></td>
                <?php } ?>
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
            $objetoVerificarLogin->guardarLogin($_POST['username'],$_POST['password']); 
          }
        }


     ?>

    <footer>
      <hr/>
      Copyright &copy; <?php echo  date("Y"); ?>
    </footer>

  </body>
</html>
