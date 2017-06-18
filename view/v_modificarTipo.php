<?php   
  if (!$_SESSION['loggedin']){
    echo "Solo usuarios registrados.<br>";
    echo "<br><a href='../view/v_login.php'>Login</a>";
    exit;
  }  
 ?>

<h3>Modificar Tipo Usuario</h3>
              
      <table>
      <form action="" method="post">
          <tr>
              <td class="der">
                  Tipo Usuario:
              </td>
              <td>
                  <input type="text" name="tipousuario" value="<?php echo $objetoMTipo->objetoUsuario->getTipoUsuario();?>"/>
              </td>
          </tr>          
          <tr>
              <td>
                  <input type="submit" name="actualizar_tipo" value="Actualizar"/>            
              </td>                    
          </tr>
        </form>
      </table>                       
  