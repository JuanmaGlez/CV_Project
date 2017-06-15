<?php 

	require_once('../model/m_perfil_consultor.php');

	 $objetoFiltrar=new Filtrarlos();

	require_once('../view/v_filtrar.php');

	if (isset($_POST['envio_filtrar'])) {
    	$objetoFiltrar->mostrarFiltro();  
    	$arrayMostrar=$objetoFiltrar->mostrarFiltro(); 
    	     if ($arrayMostrar != 0) {            
      

      ?>

      <table width="60%" border="0" align="center">
            <tr>
                  <td>Nombre</td>
                  <td>Fecha Nacimiento</td>      
                  <td>Provincia</td> 
            </tr> 

      <?php 
  
            foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {

      ?>      


            <tr>
                  <td><?php echo $persona["name"];?></td>
                  <td><?php echo $persona["birthday"]; ?></td>                        
                  <td><?php echo $persona["province"]; ?></td>                        
            </tr>      


      <?php  

  
            endforeach; // } ?>
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
<?php
} else {
      echo "No existen Usuario con esos parámetros";
}
  	}

 ?>