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
      <td>Idiomas</td>
      <td>Carnet Conducir</td>
      <td>Habilidades</td>
      <td>Conocimientos</td>
      <td>Hobbys</td>      
      <td>&nbsp;</td>
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

      
        <td><a href="javascript:Confirmar('../controller/c_perfil.php?menu=7&Id_ef=<?php echo $otros["idotros"]; ?>')"><input type='button'  name='boton_eliminar_otros' value='Eliminar'></a></td>        
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='idi' size='8' class='centrado'></td>
          <td><input type='text' name='card' size='10' class='centrado'></td>
          <td><input type='text' name='abi' size='15' class='centrado'></td>
          <td><input type='text' name='know' size='15' class='centrado'></td>
          <td><input type='text' name='hob' size='15' class='centrado'></td>    
          <td><input type='submit' name='insertar_otros' value='Insertar'></td>      
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
