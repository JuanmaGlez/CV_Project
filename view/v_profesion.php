<?php 

  $objetoMostrar = new Profex();
  

 ?>

<h3>Profesión</h3>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td>Profesión</td>
      <td>Inicio</td>
      <td>Fin</td>
      <td>Empresa</td>
      <td>Pueblo</td>
      <td>Provincia</td>
      <td>Descripción</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 

        $arrayMostrar=$objetoMostrar->mostrar(); 
        
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {
          
    ?>


    <tr>
      <td><?php echo $persona["occupation"];?></td>
      <td><?php echo $persona["start"]; ?></td>
      <td><?php echo $persona["end"]; ?></td>
      <td><?php echo $persona["company"]; ?></td>
      <td><?php echo $persona["town"]; ?></td>
      <td><?php echo $persona["province"]; ?></td>
      <td><?php echo $persona["description"]; ?></td>
      
        <td><input type='submit' name='boton_modificar_pro' value='Modificar'></a></td>
      

      
        <td><input type='submit' name='boton_eliminar_pro' value='Eliminar'></a></td>
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='Prof' size='20' class='centrado'></td>
          <td><input type='text' name='Inicio' size='8' class='centrado'></td>
          <td><input type='text' name='Fin' size='8' class='centrado'></td>
          <td><input type='text' name='Emp' size='18' class='centrado'></td>
          <td><input type='text' name='Pue' size='18' class='centrado'></td>
          <td><input type='text' name='Pro' size='10' class='centrado'></td>
          <td><input type='text' name='Desc' size='10' class='centrado'></td>
          <td><input type='submit' name='insertar_profesion' value='Insertar'></td>
        </tr> 
    <tr>
      <td>
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
