<?php 

	require_once('../model/m_perfil_consultor.php');

	 $objetoFiltrar=new Filtrarlos();

	require_once('../view/v_filtrar.php');

	if (isset($_POST['envio_filtrar'])) {
    	$objetoFiltrar->mostrarFiltro();  
    	$arrayMostrar=$objetoFiltrar->mostrarFiltro(); 
    	     if ($arrayMostrar != 0) {            
      

      ?>
<script type="text/JavaScript" src="../view/js/curri.js"></script>
      <table width="60%" border="0" align="center">
            <tr>
                  <td class="primera_fila">Nombre</td>
                  <td class="primera_fila">Email</td>      
                  <td class="primera_fila">Fecha Nacimiento</td>      
                  <td class="primera_fila">Provincia</td> 
                  <td class="primera_fila">Acción</td>      
            </tr> 

      <?php 
  
            foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {

      ?>      


            <tr>
                  <td><?php echo $persona["name"];?></td>
                  <td><?php echo $persona["email"];?></td>
                  <td><?php $fecha=$persona["birthday"];
                            $objeto = DateTime::createFromFormat('Y-m-d', $fecha);
                            $cadena= date_format($objeto, "d/m/Y");
                            echo $cadena;  ?></td>                        
                  <td><?php echo $persona["province"]; ?></td>                        
                  <td><a href="javascript:Curri('c_curriV.php?Id_vercurri=<?php echo $persona["idUsuario"]; ?>')"><input type="button" name="verCurriUsuario" value="Ver"></a></td>
            </tr> 
            


      <?php  

  
            endforeach; // } ?>
            <tr>
                  <td>
                  <?php 

                        //----------------PAGINACIÓN---------------------------------------------------
                        //Creamos un bucle for para que recorra todas las páginas. Sean 4 o 500 páginas.
                        for ($i=1; $i <=$_ENV; $i++) { 
                              echo "<a href='?menu=10&paginaf=" . $i . "'>" . $i . "</a>  ";
                        }

                  ?>
  
                  </td>
          </tr>   
      </table>
<?php
} else {
      echo "No existen Usuario con esos parámetros";
}
  	}

 ?>