  <form action="" method="post">
  <table width="60%" border="0" align="center">
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
      
        
    <?php         
       
        endforeach; // }
      }
    ?>

        <tr>
          <td><input type='text' name='idi' size='6' class='centrado'></td>
          <td><input type='text' name='card' size='8' class='centrado'></td>
          <td><input type='text' name='abi' size='13' class='centrado'></td>
          <td><input type='text' name='know' size='13' class='centrado'></td>
          <td><input type='text' name='hob' size='13' class='centrado'></td>    
          <td><input type='submit' name='insertar_otros' value='Insertar'></td>      
        </tr> 
  </table>
  </form>
