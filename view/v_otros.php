 <script type="text/JavaScript" src="../view/js/abrir.js"></script>
   <script language="JavaScript">
    function Confirmar(id){
      var mensaje = confirm("¿Esta seguro que quiere eliminarlo?");
      if (mensaje) {
        window.location = "../controller/c_perfil.php?menu=7&Id_eo="+id;
        alert("Eliminado");
      } else {
        alert("No borrado");
      }
    }

  </script>

<h3>Otros Datos</h3>

  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td class="primera_fila">Idiomas</td>
      <td class="primera_fila">Carnet Conducir</td>
      <td class="primera_fila">Habilidades</td>
      <td class="primera_fila">Conocimientos</td>
      <td class="primera_fila">Hobbys</td>      
      <td class="primera_fila" colspan="2" align="center">Acción</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 

        $arrayMostrar=$objetoMostrarO->mostrar(); 
        
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $otros): // foreach ($registros as $otros) {
          
    ?>


    <tr>
      <td><?php echo $otros["lenguage"];?></td>
      <td><?php echo $otros["card"]; ?></td>
      <td><?php echo $otros["ability"]; ?></td>
      <td><?php echo $otros["knowledge"]; ?></td>
      <td><?php echo $otros["hobby"]; ?></td>      
      
        <!--<td><input type='submit' name='boton_modificar_for' value='Modificar'></a></td>-->
        <td><a href="javascript:Abrir('../controller/c_otrosM.php?Id_mo=<?php echo $otros["idOtros"]; ?>')"><input type='button' name='boton_modificar_otros' value='Modificar'></a></td>
        <!--<td><a  href="javascript:Abrir('../controller/c_formacion.php')"><input type='button' name='boton_modificar' value='Modificar'></a></td>-->    

      
        <td><a href="javascript:Confirmar('../controller/c_perfil.php?menu=7&Id_eo=<?php echo $otros["idOtros"]; ?>')"><input type='button'  name='boton_eliminar_otros' value='Eliminar'></a></td>        
      

    <?php         
       
        endforeach; // }
      }
    ?>
   
    <tr>
      <td>
      <?php 

          //----------------PAGINACIÓN---------------------------------------------------
          //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
          for ($i=1; $i <=TOTAL_PAGINAS; $i++) { 
            echo "<a href='?menu=7&pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
