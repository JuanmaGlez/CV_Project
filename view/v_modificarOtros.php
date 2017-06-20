<?php   
  if (!$_SESSION['loggedin']){
    echo "Solo usuarios registrados.<br>";
    echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
  }  
 ?>

<h3>Modificar Otros Datos</h3>
              
      <table>
      <form action="" method="post">
          <tr>
              <td class="der">
                  Idiomas:
              </td>
              <td>
                  <input type="text" name="nombreidiomas" value="<?php echo $objetoMOtros->getLenguage();?>"/>
              </td>
          </tr>
          <tr>
              <td class="der">
                  Carnet Conducir:           
              </td>
              <td>
                  <input type="text" name="carnet" value="<?php echo $objetoMOtros->getCard();?>"/> 
              </td>
          </tr>
          <tr>
              <td>
                  Habilidad:
              </td>
              <td>
                  <input type="text" name="habil" value="<?php echo $objetoMOtros->getAbility();?>"/>
              </td>
          </tr>
          <tr>
              <td>
                  Conocimientos:           
              </td>
              <td>
                   <input type="text" name="cono" value="<?php echo $objetoMOtros->getKnowledge();?>"/>  
              </td>
          </tr>
          <tr>
              <td>
                  Hobbys:                        
              </td>
              <td>
                   <input type="text" name="hoby" value="<?php echo $objetoMOtros->getHobby();?>"/>             
              </td>
          </tr>          
          <tr>
              <td>
                  <input type="submit" name="actualizar_o" value="Actualizar"/>            
              </td>                    
          </tr>
        </form>
      </table>                       
  