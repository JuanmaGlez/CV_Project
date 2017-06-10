<?php 

    //require_once("../model/m_registrar.php");
    
 

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
        <form action="<?PHP $PHP_SELF ?>" method="post">
            <h1>Registrar Usuario</h1>
            <hr/>
            <table>
                <tr>
                    <td class="der">
                        *Username:
                    </td>
                    <td>
                        <input type="text" name="username" required/>         
                    </td>
                </tr>
                <tr>
                    <td class="der">
                        *Password:            
                    </td>
                    <td>
                        <input type="password" name="password" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        *Email:             
                    </td>
                    <td>
                        <input type="text" name="email" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        *Name:           
                    </td>
                    <td>
                         <input type="text" name="name" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        *Surname:                        
                    </td>
                    <td>
                         <input type="text" name="surname" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *DNI: 
                    </td>
                    <td>
                        <input type="text" name="dni" required>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Birthday:
                    </td>
                    <td>
                        <input type="text" name="birthday" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Address: 
                    </td>
                    <td>
                        <input type="text" name="address" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Postal: 
                    </td>
                    <td>
                        <input type="text" name="postal" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Town:
                    </td>
                    <td>
                        <input type="text" name="town" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Province:
                    </td>
                    <td>
                        <input type="text" name="province" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Mobile:
                    </td>
                    <td>
                        <input type="text" name="mobile" required/>            
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
