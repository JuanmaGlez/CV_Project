<?php
require_once ("/var/www/html/jobsnetworks/CV_Project/controller/c_registrar.php");
if(isset($_POST["submit"])){
  $objregistar=new Registrar();
  $objregistar->checkUsuario();
}
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
        <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">
            <h4>Registrar Usuario</h4>
            <hr/>
            *Username: <input type="text" name="username" class="form-control"/> <!--required/>-->
            *Password: <input type="password" name="password" class="form-control"/> <!--required/>-->
            *Email: <input type="text" name="email" class="form-control"/><!--required />-->
            *Name: <input type="text" name="name" class="form-control"/> <!--required/>-->
            *Surname: <input type="text" name="surname" class="form-control"/> <!--required/>-->
            *Birthday: <input type="text" name="birthday" class="form-control"/> <!--required/>-->
            *Address: <input type="text" name="address" class="form-control"/> <!--required/>-->
            *Postal: <input type="text" name="postal" class="form-control"/> <!--required/>-->
            *Town: <input type="text" name="town" class="form-control"/> <!--required/>-->
            *Province: <input type="text" name="province" class="form-control"/> <!--required/>-->
            *Mobile: <input type="text" name="mobile" class="form-control"/> <!--required/>-->
            Telephone: <input type="text" name="telephone" class="form-control"/>
            Todos los campos con <strong>*</strong> son obligatorios
            <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo date("Y"); ?>
        </footer>
    </body>
</html>
