<?php 

    //require_once("../model/m_registrar.php");
    
 

 ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Registrar</title>        
        <link rel="icon" type="image/jpeg" sizes="16x16" href="../view/images/muneco.png">
        <link rel="stylesheet" type="text/css" href="../view/css/registrar.css">    
        <link rel="stylesheet" type="text/css" href="../view/css/reloj.css"> 
        <script type="text/JavaScript" src="../view/js/reloj.js"></script>
    </head>
    <body onload="mueveReloj()">
        <table>
            <tr>
                <td>
                    <h1>Registrar Usuario</h1>        
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
        <form action="<?PHP $PHP_SELF ?>" method="post">       
             
            <hr/>
            <table>
                <tr>
                    <td class="der">
                        *Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="nick" required/>         
                    </td>
                </tr>
                <tr>
                    <td class="der">
                        *Password:            
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="contraseña" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        *Email:             
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="ejempo@ejemplo.es" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        *Name:           
                    </td>
                    <td>
                         <input type="text" name="name" placeholder="Juan" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        *Surname:                        
                    </td>
                    <td>
                         <input type="text" name="surname" placeholder="Díaz" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *DNI: 
                    </td>
                    <td>
                        <input type="text" name="dni" placeholder="00011100-W" required>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Birthday:
                    </td>
                    <td>
                        <input type="text" name="birthday" placeholder="01/01/1992" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Address: 
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Madrid, 32" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Postal: 
                    </td>
                    <td>
                        <input type="text" name="postal" placeholder="41310" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Town:
                    </td>
                    <td>
                        <input type="text" name="town" placeholder="Brenes" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Province:
                    </td>
                    <td>
                        <input type="text" name="province" placeholder="Sevilla" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        *Mobile:
                    </td>
                    <td>
                        <input type="text" name="mobile" placeholder="600600600" required/>            
                    </td>
                </tr>
                <tr>
                    <td>
                        Telephone:
                    </td>
                    <td>
                         <input type="text" name="telephone" placeholder="954000954"/>
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
