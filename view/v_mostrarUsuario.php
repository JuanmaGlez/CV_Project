<?php 

  $objetoMostrar = new MostrarUsuario();
  $arrayMostrar=$objetoMostrar->mostrar(); 

 ?>

  <h3>Lista de Usuarios </h3>

  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <tr>  
      <td class="primera_fila">Registro</td>    
      <td class="primera_fila">Usuario</td>
      <td class="primera_fila">Email</td>
      <td class="primera_fila">Tipo</td>
      <td class="primera_fila" colspan="2" align="center">Estado</td>
      <td>&nbsp;</td>
     
    </tr> 

    <?php 
        
        foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {
          if ($persona['idUsuario'] != 1) {
    ?>


    <tr>      
      <td nowrap><?php echo $persona["registro"];?></td>
      <td><?php echo $persona["username"];?></td>
      <td><?php echo $persona["email"]; ?></td>
      <td><?php echo $persona["tipoUsuario"]; ?></td>
      <?php if ($persona["estado"]=="activado") {  ?>
        <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <!--<td><input type='submit' name='boton_activar' value='Activar'></a></td>-->
        <td><a href="../controller/c_perfil.php?menu=8&Id_a=<?php echo $persona['idUsuario']; ?>"><input type='button' name='boton_activar' value='Activar'></a></td>
         <!--<td class="bot"><a href="v71_borrar.php?Id=<?php echo $persona->id; ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>-->
        <?php } ?>

        <?php if ($persona["estado"]=="desactivado") {  ?>
          <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <!--<td><input type='submit' name='boton_desactivar' value='Desactivar'></a></td>-->
        <td><a href="../controller/c_perfil.php?menu=8&Id_d=<?php echo $persona['idUsuario']; ?>"><input type='button' name='boton_desactivar' value='Desactivar'></a></td>
        
        <?php } ?>         

    <?php  
       if (isset($_POST['boton_desactivar'])) {
          $objetoMostrar->desactivar($persona['idUsuario']);          
        }
        if (isset($_POST['boton_activar'])) {
            $objetoMostrar->activar($persona['idUsuario']);
          }
        } //fin condicion idUsuario
        endforeach; // }
    ?>

      <tr>
      <td>&nbsp;</td>
      <td><input type='text' name='Usu' size='10' class='centrado'></td>
      <td><input type='text' name='Email' size='30' class='centrado'></td>
      <td><input type='text' name='Tipo' size='10' class='centrado'></td>
      <td><input type='text' name='Estado' size='10' class='centrado'></td>
      <td><input type='submit' name='insertar_nuevo' value='Insertar'></td>
    </tr> 
    <tr>
      <td>
      <?php 

          //----------------PAGINACIÓN---------------------------------------------------
          //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
          for ($i=1; $i <=$_ENV; $i++) { 
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
