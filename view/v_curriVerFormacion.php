<form action="" method="post">
<table width="60%" border="0" align="center">
    <?php 

        //$arrayMostrar=$objetoMostrarF->mostrar(); 
        $arrayMostrar=$objetoMostrarF->mostrarFormax($idCurri);
        if ($arrayMostrar) {

        foreach ($arrayMostrar as $formacion): // foreach ($registros as $formacion) {
          
    ?>


    <tr>
      <td id="forma" colspan="7"><?php 
    $fecha= $formacion["start"];
    $objeto = DateTime::createFromFormat('Y-m-d', $fecha);
    $cadena= date_format($objeto, "d/m/Y");
    
    $fecha2= $formacion["end"];
    $objeto2 = DateTime::createFromFormat('Y-m-d', $fecha2);
    $cadena2= date_format($objeto2, "d/m/Y");

      echo $formacion["formation"] . " " . $cadena . " " . $cadena2  . " " . $formacion["studyCenter"] . " " . $formacion["town"] . " " . $formacion["province"] . " " . $formacion["grade"]; ?></td>
             
      

    <?php         
       
        endforeach; // }
      }
    ?>
       
    
  </table>
  </form>