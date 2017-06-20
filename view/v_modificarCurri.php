<?php   
  if (!$_SESSION['loggedin']){
    echo "Solo usuarios registrados.<br>";
    echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
  }  
 ?>

<h3>Modificar Curriculum</h3>
              
      <table>
      <form action="" method="post">
          <tr>
              <td class="der">
                  Nombre
              </td>
              <td>
                  <input type="text" name="nombreCurri" value="<?php echo $objetoMCurri->objetoCurriculum->getName();?>"/>
              </td>
          </tr>          
          <tr>
              <td>
                  <input type="submit" name="actualizar_c" value="Actualizar"/>            
              </td>                    
          </tr>
        </form>
      </table>                       
  