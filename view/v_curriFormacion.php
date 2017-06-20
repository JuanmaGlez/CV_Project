<form action="" method="post">
<table width="60%" border="0" align="center">
    <?php 

        //$arrayMostrar=$objetoMostrarF->mostrar(); 
        $arrayMostrar=$objetoMostrarF->mostrarFormax($idCurri);
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $formacion): // foreach ($registros as $formacion) {
          
    ?>


    <tr>
      <td id="forma" colspan="7"><?php echo $formacion["formation"] . " " . $formacion["start"] . " " .  $formacion["end"] . " " . $formacion["studyCenter"] . " " . $formacion["town"] . " " . $formacion["province"] . " " . $formacion["grade"]; ?></td>
             
      

    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td id="forma"><input type='text' name='For' size='4' class='centrado'></td>
          <td id="forma"><input type='text' name='Inicio' size='4' class='centrado'></td>
          <td id="forma"><input type='text' name='Fin' size='4' class='centrado'></td>
          <td id="forma"><input type='text' name='Cent' size='10' class='centrado'></td>
          <td id="forma"><input type='text' name='Pue' size='10' class='centrado'></td>
          <td id="forma"><input type='text' name='Pro' size='5' class='centrado'></td>
          <td id="forma"><input type='text' name='Notas' size='5' class='centrado'></td>
          <td id="forma"><input type='submit' name='insertar_formacion' value='Insertar'></td>
        </tr> 
    
  </table>
  </form>