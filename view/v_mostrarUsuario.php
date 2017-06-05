<?php 

  //require_once('../controller/c_mostrarUsuarios.php');

  $objetoMostrar = new MostrarUsuario();
  $arrayMostrar=$objetoMostrar->mostrar(); 

  /*if (isset($_POST['insertar_nuevo'])) {
    $objetoMostrar->addUser($_POST['Usu'],$_POST['Email'],$_POST['Tipo'],$_POST['Estado']);
  }*/

 ?>

  <h3>Lista de Usuarios </h3>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <table width="60%" border="0" align="center">
    <tr >
      <td>Usuario</td>
      <td>Email</td>
      <td>Tipo</td>
      <td>Estado</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> 

    <?php 
        
        foreach ($arrayMostrar as $persona): // foreach ($registros as $persona) {
          if ($persona['idUsuario'] != 1) {
    ?>


    <tr>
      <td><?php echo $persona["username"];?></td>
      <td><?php echo $persona["email"]; ?></td>
      <td><?php echo $persona["tipoUsuario"]; ?></td>
      <?php if ($persona["estado"]=="activado") {  ?>
        <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <td><input type='submit' name='boton_activar' value='Activar'></a></td>
        <?php } ?>

        <?php if ($persona["estado"]=="desactivado") {  ?>
          <td><?php echo $persona["estado"]; ?></td>
       <?php  } else { ?>         
        <td><input type='submit' name='boton_desactivar' value='Desactivar'></a></td>
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
          for ($i=1; $i <=TOTAL_PAGINAS; $i++) { 
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
          }

       ?>
        
      </td>
    </tr>   
  </table>
  </form>
