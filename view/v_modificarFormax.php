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
                  Formación:
              </td>
              <td>
                  <input type="text" name="nombreformacion" value="<?php echo $objetoMFormar->getFormation();?>"/>
              </td>
          </tr>
          <tr>
              <td class="der">
                  Inicio:            
              </td>
              <td>
                  <input type="text" name="iniciof" value="<?php echo $objetoMFormar->getStart();?>"/> 
              </td>
          </tr>
          <tr>
              <td>
                  Fin:             
              </td>
              <td>
                  <input type="text" name="finF" value="<?php echo $objetoMFormar->getEnd();?>"/>
              </td>
          </tr>
          <tr>
              <td>
                  Centro de Estudios:           
              </td>
              <td>
                   <input type="text" name="centrof" value="<?php echo $objetoMFormar->getStudyCenter();?>"/>  
              </td>
          </tr>
          <tr>
              <td>
                  Pueblo:                        
              </td>
              <td>
                   <input type="text" name="puef" value="<?php echo $objetoMFormar->getTown();?>"/>             
              </td>
          </tr>
          <tr>
              <td>
                  Provincia: 
              </td>
              <td>
                  <input type="text" name="probf" value="<?php echo $objetoMFormar->getProvince();?>">            
              </td>
          </tr>
          <tr>
              <td>
                  Notas:
              </td>
              <td>
                  <input type="text" name="notasf" value="<?php echo $objetoMFormar->getGrade();?>"/>             
              </td>
          </tr>          
          <tr>
              <td>
                  <input type="submit" name="actualizar_f" value="Actualizar"/>            
              </td>                    
          </tr>
        </form>
      </table>                       
  