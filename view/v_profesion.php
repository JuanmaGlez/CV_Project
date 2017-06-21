<script type="text/JavaScript" src="../view/js/abrir.js"></script>

<script language="JavaScript">
    function Confirmar(id){
      var mensaje = confirm("¿Esta seguro que quiere eliminarlo?");
      if (mensaje) {
        window.location = "../controller/c_perfil.php?menu=6&Id_ef="+id;
        alert("Eliminado");
      } else {
        alert("No borrado");
      }
    }

</script>

<h3>Profesión</h3>

  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td nowrap class="primera_fila" >Profesión</td>
      <td class="primera_fila" >Inicio</td>
      <td class="primera_fila">Fin</td>
      <td class="primera_fila">Empresa</td>
      <td class="primera_fila">Pueblo</td>
      <td class="primera_fila">Provincia</td>
      <td class="primera_fila">Descripción</td>
      <td class="primera_fila" colspan="2" align="center">Acción</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 

        $arrayMostrar=$objetoMostrarP->mostrar(); 
        
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
      
        <!--<td><input type='submit' name='boton_modificar_pro' value='Modificar'></a></td>-->
         <td><a href="javascript:Abrir('../controller/c_profeM.php?Id_mp=<?php echo $persona["idProfesion"]; ?>')"><input type='button' name='boton_modificar_pro' value='Modificar'></a></td>
      

      
        <!--<td><input type='submit' name='boton_eliminar_pro' value='Eliminar'></a></td>-->
         <td><a href="javascript:Confirmar('../controller/c_perfil.php?menu=6&Id_ep=<?php echo $persona["idProfesion"]; ?>')"><input type='button' name='boton_eliminar_pro' value='Eliminar'></a></td>
      

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
            echo "<a href='?menu=6&pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
