<?php 
      require_once('../controller/c_perfil_consultor.php');

      //$objetoFiltrar=new Filtrarlos();
      //$objetoFiltrar->mostrarFiltro();  

?>
      <form action="" method="post">
            <table  border="0">
                  <tr>
                        <td>Filtrar por</td>
                        
                  </tr>                  
                  <tr>
                        <td>
                            <!--  <select name="pg1" onchange="d1(this)" >
                                    <option value="0">Filtrar</option>
                                    <option value="1">Edad</option>
                                    <option value="2">Formación</option>
                                    <option value="3">Profesión</option>
                                    <option value="4">Provincia</option>
                                    <option value="otro1">Otros</option>
                              </select> ¿?-->
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
                              <input type="submit" name="envio_filtrar" value="Filtrar">
                        </td>
                  </tr>
            </table>                       
      </form>



<?php 

      if (isset($_POST['envio_filtrar'])) {
            //echo $_POST['tipo'] . ' ' . $_POST['desde'] . ' ' . $_POST['hasta']; 
            $objetoFiltrar = new Filtrarlos();
            $arrayMostrar=$objetoFiltrar->mostrarFiltro(); 
            if ($arrayMostrar != 0) {            
            

            ?>

            <table width="60%" border="0" align="center">
                  <tr>
                        <td>Usuario</td>
                        <td>Fecha</td>      
                  </tr> 

            <?php 
        
                  foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {

            ?>      


                  <tr>
                        <td><?php echo $persona["username"];?></td>
                        <td><?php echo $persona["birthday"]; ?></td>
                        <td><?php echo $persona["tipoUsuario"]; ?></td>
                        <td><?php echo $persona["province"]; ?></td>
                  </tr>      


            <?php  
      
        
                  endforeach; // } ?>
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
      <?php
      } else {
            echo "No existen Usuario con esos parámetros";
      }
    ?>

      <?php }


//}    ?>
