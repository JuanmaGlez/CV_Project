<?php
session_start();
require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/controller/c_modificarDatos.php");
require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");
if(isset($_POST["submit"])){
  $objmodificar=new Modificar();
  $objmodificar->checkModificar();
  //echo "datos enviados";
}
$objvalor=new Usuarios($_SESSION['idUsuario']);
//$objvalor=new Usuarios(1);
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Registrar</title>
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
        <!--<form action="../controller/c_verificar.php" method="post" class="col-lg-5">-->
        <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">
            <h4>Modificar Usuario</h4>
            <hr/>
            Username: <input type="text" name="username" value="<?php echo $objvalor->getUsername();?>" class="form-control"/> <!--required/>-->
            Password: <input type="password" name="password" value="<?php echo $objvalor->getPassword();?>" class="form-control"/> <!--required/>-->
            Email: <input type="text" name="email" value="<?php echo $objvalor->getEmail();?>" class="form-control"/><!--required />-->
            Name: <input type="text" name="name" value="<?php echo $objvalor->getName();?>" class="form-control"/> <!--required/>-->
            Surname: <input type="text" name="surname" value="<?php echo $objvalor->getSurname();?>" class="form-control"/> <!--required/>-->
            Birthday: <input type="text" name="birthday" value="<?php echo $objvalor->getBirthday();?>" class="form-control"/> <!--required/>-->
            Address: <input type="text" name="address" value="<?php echo $objvalor->getAddress();?>" class="form-control"/> <!--required/>-->
            Postal: <input type="text" name="postal" value="<?php echo $objvalor->getPostal();?>" class="form-control"/> <!--required/>-->
            Town: <input type="text" name="town" value="<?php echo $objvalor->getTown();?>" class="form-control"/> <!--required/>-->
            Province: <input type="text" name="province" value="<?php echo $objvalor->getProvince();?>" class="form-control"/> <!--required/>-->
            Mobile: <input type="text" name="mobile" value="<?php echo $objvalor->getMobile();?>" class="form-control"/> <!--required/>-->
            Telephone: <input type="text" name="telephone" value="<?php echo $objvalor->getTelephone();?>" class="form-control"/>
            Todos los campos con <strong>*</strong> son obligatorios
            <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo date("Y"); ?>
        </footer>
    </body>
</html>
