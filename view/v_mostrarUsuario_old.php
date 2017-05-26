<h3>Lista de Usuarios </h3>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <table width="60%" border="0" align="center">
    <tr align="center" >
      <td class="primera_fila">Registrado</td>
      <td class="primera_fila">Usuario</td>
      <td class="primera_fila">Email</td>      
      <td class="primera_fila">Tipo</td>
      <td class="primera_fila" colspan="2" align="center">Estado</td>
      
      
    </tr> 

    <?php 
        
        foreach ($arrayPersonas as $persona): // foreach ($registros as $persona) {

          if ($persona["idUsuario"] !=1 ) {            
        
    ?>

    <tr align="center">
      <td nowrap><?php echo $persona["registro"]; ?></td>
      <td><?php echo $persona["username"];?></td>
      <td><?php echo $persona["email"]; ?></td>      
      <td><?php echo $persona["tipoUsuario"]; ?></td>
      <?php if ($persona["estado"]=="activado") {  ?>
        <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <td><input type='submit' name='boton_activar' value='Activar'></a></td>
        <?php } ?>

        <?php if ($persona["estado"]=="desactivado") {  ?>
          <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <td><input type='submit' name='boton_desactivar' value='Desactivar'></a></td>
        <?php } ?>         

    <?php  
      }
        endforeach; // }
    ?>

        <tr>
      <td></td>
      <td><input type='text' name='Usu' size='10' class='centrado'></td>
      <td><input type='text' name='Email' size='30' class='centrado'></td>
      <td><input type='text' name='Tipo' size='10' class='centrado'></td>
      <td><input type='text' name='Estado' size='10' class='centrado'></td>
      <td><input type='submit' name='insertar_nuevo' id='cr' value='Insertar'></td>
    </tr> 
    <tr>
      <td align="center">
      <?php 

          //----------------PAGINACIÓN---------------------------------------------------
          //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
          for ($i=1; $i <=TOTAL_PAGINAS; $i++) { 
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>

  

