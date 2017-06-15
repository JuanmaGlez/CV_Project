 <script type="text/JavaScript" src="../view/js/abrir.js"></script>
   <script language="JavaScript">
    function Confirmar(id){
      var mensaje = confirm("¿Esta seguro que quiere eliminarlo?");
      if (mensaje) {
        window.location = "../controller/c_perfil.php?menu=5&Id_ef="+id;
        alert("Eliminado");
      } else {
        alert("No borrado");
      }
    }

  </script>

<h3>Formación</h3>

  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td>Formación</td>
      <td>Inicio</td>
      <td>Fin</td>
      <td>Centro de Estudios</td>
      <td>Pueblo</td>
      <td>Provincia</td>
      <td>Notas</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 

        $arrayMostrar=$objetoMostrarF->mostrar(); 
        
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {
          
    ?>


    <tr>
      <td><?php echo $persona["formation"];?></td>
      <td><?php echo $persona["start"]; ?></td>
      <td><?php echo $persona["end"]; ?></td>
      <td><?php echo $persona["studyCenter"]; ?></td>
      <td><?php echo $persona["town"]; ?></td>
      <td><?php echo $persona["province"]; ?></td>
      <td><?php echo $persona["grade"]; ?></td>
      
        <!--<td><input type='submit' name='boton_modificar_for' value='Modificar'></a></td>-->
        <td><a href="javascript:Abrir('../controller/c_formarM.php?Id_mf=<?php echo $persona["idFormacion"]; ?>')"><input type='button' name='boton_modificar_for' value='Modificar'></a></td>
        <!--<td><a  href="javascript:Abrir('../controller/c_formacion.php')"><input type='button' name='boton_modificar' value='Modificar'></a></td>-->    

      
        <td><a href="javascript:Confirmar('../controller/c_perfil.php?menu=5&Id_ef=<?php echo $persona["idFormacion"]; ?>')"><input type='button'  name='boton_eliminar_for' value='Eliminar'></a></td>        
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='For' size='20' class='centrado'></td>
          <td><input type='text' name='Inicio' size='8' class='centrado'></td>
          <td><input type='text' name='Fin' size='8' class='centrado'></td>
          <td><input type='text' name='Cent' size='18' class='centrado'></td>
          <td><input type='text' name='Pue' size='18' class='centrado'></td>
          <td><input type='text' name='Pro' size='10' class='centrado'></td>
          <td><input type='text' name='Notas' size='10' class='centrado'></td>
          <td><input type='submit' name='insertar_formacion' value='Insertar'></td>
        </tr> 
    <tr>
      <td>
      <?php 

          //----------------PAGINACIÓN---------------------------------------------------
          //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
          for ($i=1; $i <=TOTAL_PAGINAS; $i++) { 
            echo "<a href='?menu=5&pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
