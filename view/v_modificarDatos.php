<?php   
  if (!$_SESSION['loggedin']){
    echo "Solo usuarios registrados.<br>";
    echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
  }
  require_once("../controller/c_modificarDatos.php");
  
  $objetoModificar =new ModificarDatos();  
  
 ?>

<h3>Modificar Datos Personales</h3>
  

            
      <table>
          <tr>
              <td class="der">
                  Username:
              </td>
              <td>
                  <input type="text" name="nombreusuario" value="<?php echo $objetoModificar->objetoUsuario->getUsername();?>"/>
              </td>
          </tr>
          <tr>
              <td class="der">
                  Password:            
              </td>
              <td>
                  <input type="password" name="contra" value="<?php echo $_SESSION['pass'];//$objetoModificar->objetoUsuario->getPassword();?>"/> 
              </td>
          </tr>
          <tr>
              <td>
                  Email:             
              </td>
              <td>
                  <input type="text" name="email" value="<?php echo $objetoModificar->objetoUsuario->getEmail();?>"/>
              </td>
          </tr>
          <tr>
              <td>
                  Name:           
              </td>
              <td>
                   <input type="text" name="name" value="<?php echo $objetoModificar->objetoUsuario->getName();?>"/>  
              </td>
          </tr>
          <tr>
              <td>
                  Surname:                        
              </td>
              <td>
                   <input type="text" name="surname" value="<?php echo $objetoModificar->objetoUsuario->getSurname();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  DNI: 
              </td>
              <td>
                  <input type="text" name="dni" value="<?php echo $objetoModificar->objetoUsuario->getDNI();?>">            
              </td>
          </tr>
          <tr>
              <td>
                  Birthday:
              </td>
              <td>
                  <input type="text" name="birthday" value="<?php echo $objetoModificar->objetoUsuario->getBirthday();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Address: 
              </td>
              <td>
                  <input type="text" name="address" value="<?php echo $objetoModificar->objetoUsuario->getAddress();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Postal: 
              </td>
              <td>
                  <input type="text" name="postal" value="<?php echo $objetoModificar->objetoUsuario->getPostal();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Town:
              </td>
              <td>
                  <input type="text" name="town" value="<?php echo $objetoModificar->objetoUsuario->getTown();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Province:
              </td>
              <td>
                  <input type="text" name="province" value="<?php echo $objetoModificar->objetoUsuario->getProvince();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Mobile:
              </td>
              <td>
                  <input type="text" name="mobile" value="<?php echo $objetoModificar->objetoUsuario->getMobile();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Telephone:
              </td>
              <td>
                   <input type="text" name="telephone" value="<?php echo $objetoModificar->objetoUsuario->getTelephone();?>"/>
              </td>
          </tr>
          <tr>
              <td>
                  <input type="submit" name="actualizar" value="Actualizar"/>            
              </td>                    
          </tr>
      </table>                       
  