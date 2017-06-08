<?php
//require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/CV_Project/controller/c_recuperarpass.php");
require_once ('../model/m_recuperarpass.php');
//require_once ("../../model/Usuarios.php");
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Restaurar Contraseña</title>
        <link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/goku1.jpeg">
        <link rel="stylesheet" type="text/css" href="../view/css/recuperarpass.css">   
      <!--  <script type="text/javascript" >
            function redireccionar(){
                window.location="http://jobsnetworks.dev/CV_Project_Fin";                
            }
            //setTimeout("redireccionar()", 5000); //redirige usando la función
            setTimeout("window.close()", 10000); // cierra la pestaña
        </script>-->
    </head>
    <body onload="redireccionar">
        <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">
            <h3>Recuperar Password</h3>
            <hr/>
            <table>
                <tr>
                    <td>
                        Correo:
                    </td>
                    <td>
                        <input type="email" name="correo"/>            
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="ecorreo" value="Enviar"/>            
                    </td>
                </tr>
            </table>           
        </form>

        <?php 

            if(isset($_POST["ecorreo"])){
              $objcorreo=new Recuperar($_POST['correo']);
              //$objcorreo->vacio();
              $objcorreo->enviado();
              //echo "Saliendo";
              //echo "datos enviados";
            }

         ?>

        <footer>
            <hr/>
           Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>
