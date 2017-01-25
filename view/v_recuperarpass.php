<?php
/*require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/CV_Project/controller/c_recuperarpass.php");
//require_once ("../../model/Usuarios.php");
if(isset($_POST["ecorreo"])){
  $objcorreo=new Recuperar($_POST['correo']);
  //$objcorreo->vacio();
  $objcorreo->enviado();
  //echo "Saliendo";
  //echo "datos enviados";
}*/
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Restaurar Contraseña</title>
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
            <h3>Recuperar Password</h3>
            <hr/>
            Correo: <input type="email" name="correo" class="form-control"/>
            <input type="submit" name="ecorreo" value="Submit" class="btn btn-success"/>
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>
