<?php
/*require_once ("../controller/c_registrar.php");
if(isset($_POST["submit"])){
  $objregistar=new Registrar();
  $objregistar->checkUsuario();
}*/
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
            <h4>Añadir Otros Datos</h4>
            <hr/>
            *Lenguaje: <input type="text" name="formacion" class="form-control"/> <!--required/>-->
            *Card: <input type="password" name="inicio" class="form-control"/> <!--required/>-->
            *Ability: <input type="text" name="fin" class="form-control"/><!--required />-->
            *Knowledge: <input type="text" name="centro" class="form-control"/> <!--required/>-->
            Hobby: <input type="text" name="Notas" class="form-control"/> <!--required/>-->
            Todos los campos con <strong>*</strong> son obligatorios
            <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo date("Y"); ?>
        </footer>
    </body>
</html>
