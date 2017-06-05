<?php 

    require_once("../controller/c_registrar.php");
    
    if (isset($_POST["submit"])) {

        $objetoRegistrar=new Registrar(); 
        $objetoRegistrar->insertar();
    }

 ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Registrar</title>        
        <link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/goku1.jpeg">
        <link rel="stylesheet" type="text/css" href="../view/css/registrar.css">    
    </head>
    <body>
        <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">
            <h1>Registrar Usuario</h1>
            <hr/>
            <table>
                <tr>
                    <td class="der">
                        *Username:
                    </td>
                    <td>
                        <input type="text" name="username" class="form-control"/> <!--required/>-->         
                    </td>
                </tr>
                <tr>
                    <td class="der">
                        *Password:            
                    </td>
                    <td>
                        <input type="password" name="password" class="form-control"/> <!--required/>-->
                    </td>
                </tr>
                <tr>
                    <td>
                        *Email:             
                    </td>
                    <td>
                        <input type="text" name="email" class="form-control"/><!--required />-->
                    </td>
                </tr>
                <tr>
                    <td>
                        *Name:           
                    </td>
                    <td>
                         <input type="text" name="name" class="form-control"/> <!--required/>--> 
                    </td>
                </tr>
                <tr>
                    <td>
                        *Surname:                        
                    </td>
                    <td>
                         <input type="text" name="surname" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *DNI: 
                    </td>
                    <td>
                        <input type="text" name="dni">            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Birthday:
                    </td>
                    <td>
                        <input type="text" name="birthday" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Address: 
                    </td>
                    <td>
                        <input type="text" name="address" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Postal: 
                    </td>
                    <td>
                        <input type="text" name="postal" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Town:
                    </td>
                    <td>
                        <input type="text" name="town" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Province:
                    </td>
                    <td>
                        <input type="text" name="province" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Mobile:
                    </td>
                    <td>
                        <input type="text" name="mobile" class="form-control"/> <!--required/>-->            
                    </td>
                </tr>
                <tr>
                    <td>
                        Telephone:
                    </td>
                    <td>
                         <input type="text" name="telephone" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Todos los campos con <strong>*</strong> son obligatorios            
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Enviar" class="btn btn-success"/>            
                    </td>
                    <td>
                        <input type="reset" name="submit" value="Borrar" class="btn btn-success"/>            
                    </td>
                </tr>
            </table>                       
        </form>

        <footer class="col-lg-12">
            <hr/>
           Copyright &copy; <?php echo date("Y"); ?>
        </footer>
    </body>
</html>
