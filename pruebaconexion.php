<?php
  $enlace = mysqli_connect("localhost", "manu", "5Fa2afCt75", "pcurridb02");

   if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos pcurridb02 es genial." . PHP_EOL;
  echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

// añadido desde aqui
  $sql = "SELECT * FROM usuarios where idUsuario =1";
  if (!$resultado = $enlace->query($sql)) {
      // ¡Oh, no! La consulta falló.
      echo "Lo sentimos, este sitio web está experimentando problemas.";

      // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
      // cómo obtener información del error
      echo "Error: La ejecución de la consulta falló debido a: \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit;
  }

  

  if ($resultado->num_rows === 0) {
    // ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
    // no. Nosotros decidimos. En este caso, ¿podría haber sido
    // actor_id demasiado grande?
    echo "Lo sentimos. No se pudo encontrar una coincidencia para el ID Manu. Inténtelo de nuevo.";
    exit;
}
//hasta aqui
  while ($a=$resultado->fetch_assoc()) {
    echo $a['birthday'];
  }
  mysqli_close($enlace);
  ?>
