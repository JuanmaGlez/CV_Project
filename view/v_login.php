<?php
//session_start();
require_once ("../controller/c_perfil.php");
if(isset($_POST["entrar"])){
  $objVerLog=new Perfil($_POST['username'],$_POST['password']);
  $objVerLog->checkLogin();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Curriculum</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
  </head>
  <body>
    <header>
      <h1>CURRICULUM</h1>
    </header>
    <input type="button" onclick=" location.href='v_registrar.php' " value="Registrar">
    <!--<form action="v_registrar.php" method="post">
      <input type="submit" name="registrar" value="Registrar">
    </form>-->

    <div class="login">
        <!--<form action="../rprueba2.php" method="post">-->
        <!--<form action="v_perfil.php" method="post">-->
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
              <td colspan="2" id="centrar">
                <input type="submit" name="entrar" value="Entrar">
              </td><td></td>
            </tr>
          </table>
        </form>
        <p>
          Si ha olvidado la contraseña pulse <a href="v_recuperarpass.php" target="_blank">aquí</a>
        </p>
    </div>

  </body>
</html>
