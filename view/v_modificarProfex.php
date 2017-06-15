<?php   
  if (!$_SESSION['loggedin']){
    echo "Solo usuarios registrados.<br>";
    echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
  }  
 ?>

<h3>Modificar Formación</h3>
              
      <table>
      <form action="" method="post">
          <tr>
              <td class="der">
                  Profesión:
              </td>
              <td>
                  <input type="text" name="nombreprofesion" value="<?php echo $objetoMProfe->getOccupation();?>"/>
              </td>
          </tr>
          <tr>
              <td class="der">
                  Inicio:            
              </td>
              <td>
                  <input type="text" name="iniciop" value="<?php echo $objetoMProfe->getStart();?>"/> 
              </td>
          </tr>
          <tr>
              <td>
                  Fin:             
              </td>
              <td>
                  <input type="text" name="finP" value="<?php echo $objetoMProfe->getEnd();?>"/>
              </td>
          </tr>
          <tr>
              <td>
                  Empresa:           
              </td>
              <td>
                   <input type="text" name="empresap" value="<?php echo $objetoMProfe->getCompany();?>"/>  
              </td>
          </tr>
          <tr>
              <td>
                  Pueblo:                        
              </td>
              <td>
                   <input type="text" name="puep" value="<?php echo $objetoMProfe->getTown();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Provincia: 
              </td>
              <td>
                  <input type="text" name="probp" value="<?php echo $objetoMProfe->getProvince();?>">            
              </td>
          </tr>
          <tr>
              <td>
                  Descripción:
              </td>
              <td>
                  <input type="text" name="descp" value="<?php echo $objetoMProfe->getDescription();?>"/>             
              </td>
          </tr>          
          <tr>
              <td>
                  <input type="submit" name="actualizar_p" value="Actualizar"/>            
              </td>                    
          </tr>
        </form>
      </table>                       
  