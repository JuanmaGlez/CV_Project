<form action="" method="post">
      <table  border="0">
            <tr>                  
                  <td>Filtrar por</td>                  
            </tr>                  
            <tr>
                  <td>                  
                        Edad <input type="hidden" name='tipo' value="birthday" >
                  </td>
                  <td>
                        Desde <input type='text' name='desde' size='10'>
                  </td>
                  <td>
                        Hasta <input type='text' name='hasta' size='10'>
                  </td>                        
            </tr>
            <tr></tr>
            <tr>
                  <td>
                        Provincia <input type="hidden" name='tipo_provincia' value="province" >
                  </td>
                  <td colspan="2">
                       <input type='text' name='provincia' size='30'> 
                  </td>
            </tr>
            <tr>
                  <td>
                        Formación<input type="hidden" name='tipo_formacion' value="formation" >
                  </td>
                  <td colspan="2">
                       <input type='text' name='formacion' size='30'> 
                  </td>
            </tr>
            <tr>
                  <td>
                        Profesión<input type="hidden" name='tipo_profesión' value="occupation" >
                  </td>
                  <td colspan="2">
                       <input type='text' name='profesion' size='30'> 
                  </td>
            </tr>
            <tr>
                  <td>
                        <input type="submit" name="envio_filtrar" value="Filtrar">
                  </td>
            </tr>
      </table>                       
</form>

