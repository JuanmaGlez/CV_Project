 <script type="text/JavaScript" src="../view/js/abrir.js"></script>

 <script type="text/JavaScript" src="../view/js/curri.js"></script>

   <script language="JavaScript">
    function Confirmar(id){
      var mensaje = confirm("¿Esta seguro que quiere eliminarlo?");
      if (mensaje) {
        window.location = "../controller/c_perfil.php?menu=4&Id_ef="+id;
        alert("Eliminado");
      } else {
        alert("No borrado");
      }
    }

  </script>

<h2>Curriculum</h2>

  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td class="primera_fila">Nombre Curriculum</td>      
      <td class="primera_fila" colspan="3" align="center">Acción</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 

        $arrayMostrar=$objetoCurri->mostrar(); 
        
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $curriculum): 
          
    ?>


    <tr>
      <td><?php echo $curriculum["nameCurri"];?></td>

        <td><a href="javascript:Curri('../controller/c_curriR.php?Id_rc=<?php echo $curriculum["idCurri"]; ?>')"><input type="button" name="ver_curri" value="Ver"></a></td>
                    
        <td><a href="javascript:Abrir('../controller/c_curriM.php?Id_mc=<?php echo $curriculum["idCurri"]; ?>')"><input type='button' name='boton_modificar_curri' value='Modificar'></a></td>
            
        <td><a href="javascript:Confirmar('../controller/c_perfil.php?menu=4&Id_ec=<?php echo $curriculum["idCurri"]; ?>')"><input type='button'  name='boton_eliminar_curri' value='Eliminar'></a></td>        
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='nombre_curri' size='20' class='centrado'></td>          
          <td><input type='submit' name='guardar_curri' value='Guardar'></td>
        </tr> 
    <tr>
      <td>
      <?php 

          //----------------PAGINACIÓN---------------------------------------------------
          //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
          for ($i=1; $i <=TOTAL_PAGINAS; $i++) { 
            echo "<a href='?menu=4&pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
