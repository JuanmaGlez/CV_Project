<?php
session_start();
require_once ("../controller/c_perfil.php");
//require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

$objVerLog=new Perfil($_POST['username'],$_POST['password']);
$objVerLog->checkLogin();
$objVerLog->checkConexion();

if(isset($_POST["salir"])){
  $objVerLog->closeSession();
}
?>

<h1>CURRICULUM VITAE</h1>
<h2>Perfil <?php echo $_SESSION['username']?> </h2>
<form action="<?PHP $PHP_SELF ?>" method="post">
  <input type="submit" name="salir" value="Salir">
</form>
<br>
<h3>Datos Personales</h3>
<form action="v_modificarUsuario.php" method="post">
  <input type="submit" name="modificar" value="Modificar">
</form>
<?php
echo $objVerLog->objUser->getUsername() . "<br>";
echo $objVerLog->objUser->getPassword() . "<br>";
echo $objVerLog->objUser->getEmail() . "<br>";
echo $objVerLog->objUser->getName() . " " . $objVerLog->objUser->getSurname() . "<br>";
echo $objVerLog->objUser->getBirthday() . "<br>";
echo $objVerLog->objUser->getAddress() . "<br>";
echo $objVerLog->objUser->getPostal() . "<br>";
echo $objVerLog->objUser->getTown() . "<br>";
echo $objVerLog->objUser->getProvince() . "<br>";
echo $objVerLog->objUser->getMobile() . "<br>";
echo $objVerLog->objUser->getTelephone() . "<br>";*/


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
