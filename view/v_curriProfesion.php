<form action="" method="post">
<table width="60%" border="0" align="center">
<?php 

        //$arrayMostrar=$objetoMostrarP->mostrar(); 
        $arrayMostrar=$objetoMostrarP->mostrarProfex($idCurri); 
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $profesion): // foreach ($registros as $profesion) {
          
    ?>


    <tr>
      <td id="forma" colspan="7"><?php
    
    $fecha= $profesion["start"];
    $objeto = DateTime::createFromFormat('Y-m-d', $fecha);
    $cadena= date_format($objeto, "d/m/Y");
    
    $fecha2= $profesion["end"];
    $objeto2 = DateTime::createFromFormat('Y-m-d', $fecha2);
    $cadena2= date_format($objeto2, "d/m/Y");

       echo $profesion["occupation"] . " " . $cadena . " " . $cadena2 . " " . $profesion["company"] . " " . $profesion["town"] . " " . $profesion["province"] . " " . $profesion["description"]; ?></td>
        
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='Prof' size='4' class='centrado'></td>
          <td><input type='text' name='Inicio' size='4' class='centrado'></td>
          <td><input type='text' name='Fin' size='4' class='centrado'></td>
          <td><input type='text' name='Emp' size='10' class='centrado'></td>
          <td><input type='text' name='Pue' size='10' class='centrado'></td>
          <td><input type='text' name='Pro' size='5' class='centrado'></td>
          <td><input type='text' name='Desc' size='5' class='centrado'></td>
          <td><input type='submit' name='insertar_profesion' value='Insertar'></td>
        </tr> 
    
  </table>
  </form>
