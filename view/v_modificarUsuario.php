<?php
session_start();
if (!$_SESSION['loggedin']){
  echo "Solo usuarios registrados.<br>";
  echo "<br><a href='../view/v_login.php'>Login</a>";
  exit;
}
//require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/CV_Project/controller/c_modificarDatos.php");
require_once ("../controller/c_modificarDatos.php");
/*require_once ("../controller/c_perfil.php");
$objVerLog=new Perfil($_POST['username'],$_POST['password']);
$objVerLog->checkConexion();*/

$objmodificar=new Modificar();
if(isset($_POST["submit"])){
  $objmodificar->checkModificar();
}

//$objvalor=new Usuarios($_SESSION['idUsuario']);
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Modificar Usuario</title>
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

        <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">
            <h4>Modificar Usuario</h4>
            <hr/>
            Username: <input type="text" name="username" value="<?php echo $objmodificar->user->getUsername();?>" class="form-control"/> <!--required/>-->
            Password: <input type="password" name="password" value="<?php echo $objmodificar->user->getPassword();?>" class="form-control"/> <!--required/>-->
            Email: <input type="text" name="email" value="<?php echo $objmodificar->user->getEmail();?>" class="form-control"/><!--required />-->
            Name: <input type="text" name="name" value="<?php echo $objmodificar->user->getName();?>" class="form-control"/> <!--required/>-->
            Surname: <input type="text" name="surname" value="<?php echo $objmodificar->user->getSurname();?>" class="form-control"/> <!--required/>-->
            Birthday: <input type="text" name="birthday" value="<?php echo $objmodificar->user->getBirthday();?>" class="form-control"/> <!--required/>-->
            Address: <input type="text" name="address" value="<?php echo $objmodificar->user->getAddress();?>" class="form-control"/> <!--required/>-->
            Postal: <input type="text" name="postal" value="<?php echo $objmodificar->user->getPostal();?>" class="form-control"/> <!--required/>-->
            Town: <input type="text" name="town" value="<?php echo $objmodificar->user->getTown();?>" class="form-control"/> <!--required/>-->
            Province: <input type="text" name="province" value="<?php echo $objmodificar->user->getProvince();?>" class="form-control"/> <!--required/>-->
            Mobile: <input type="text" name="mobile" value="<?php echo $objmodificar->user->getMobile();?>" class="form-control"/> <!--required/>-->
            Telephone: <input type="text" name="telephone" value="<?php echo $objmodificar->user->getTelephone();?>" class="form-control"/>
            Todos los campos con <strong>*</strong> son obligatorios
            <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo date("Y"); ?>
        </footer>
    </body>
</html>
