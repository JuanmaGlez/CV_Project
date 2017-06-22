  <form action="" method="post">
  <table width="60%" border="0" align="center">
    <?php 

        //$arrayMostrar=$objetoMostrarO->mostrar();        
        $arrayMostrar=$objetoMostrarO->mostrarOtrox($idCurri); 

        if ($arrayMostrar) {

        foreach ($arrayMostrar as $otros): // foreach ($registros as $otros) {
          
    ?>


    <tr>
      <td id="forma" ><?php echo $otros["lenguage"];?></td>
      <td id="forma"><?php echo $otros["card"]; ?></td>
      <td id="forma"><?php echo $otros["ability"]; ?></td>
      <td id="forma"><?php echo $otros["knowledge"]; ?></td>
      <td id="forma"><?php echo $otros["hobby"]; ?></td>      
      
        
    <?php         
       
        endforeach; // }
      }
    ?>
    
  </table>
  </form>
