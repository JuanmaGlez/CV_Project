<?php
session_start();
require_once ("../controller/c_verificar.php");
require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/controller/c_datosPersonales.php");
//require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");
//require_once ("../model/Conectar.php");
//$objConectar=new Conectar();
//$objConectar->conexion();

$objVerificar=new Verificar();
$objVerificar->checkLogin();

if(isset($_POST["salir"])){
  $objsalir=new Verificar();
  $objsalir->closeSession();
  //echo "Saliendo";
  //echo "datos enviados";
} elseif ($_POST["modificar"]) {
  //echo "Modificamos";
  header('location:http://jmgonzalez.com/proyecto_curri4/view/v_modificarUsuario.php');
}
?>

<h1>CURRICULUM VITAE</h1>
<h2>Perfil <?php echo $_SESSION['username']?> </h2>
<form action="<?PHP $PHP_SELF ?>" method="post">
  <input type="submit" name="salir" value="Salir">
</form>
<br>
<h3>Datos Personales</h3>
<form action="<?PHP $PHP_SELF ?>" method="post">
  <input type="submit" name="modificar" value="Modificar">
</form>
<?php
$objUsuario=new Usuarios($_SESSION['idUsuario']);
echo $objUsuario->getIdUsuario() . "<br>";
echo $objUsuario->getUsername() . "<br>";
echo $objUsuario->getPassword() . "<br>";
echo $objUsuario->getName() . "<br>";
echo $objUsuario->getSurname() . "<br>";


if ($_SESSION['idTipoUsuario']==1) {
  echo $_SESSION['idTipoUsuario'];
  echo "Vamos por buen camino";
} elseif ($_SESSION['idTipoUsuario']==2) {
  $_SESSION['idTipoUsuario'];
  echo "Seguimos por buen caminio";
} else {
  echo "Podemos hacer el cambio";
}
 ?>
