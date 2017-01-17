<?php
session_start();
//require_once ("../controller/c_verificar.php");
require_once ("../controller/c_perfil.php");
require_once ("/furanet/sites/jmgonzalez.com/web/htdocs/proyecto_curri4/model/Usuarios.php");

$objVerLog=new Perfil($_POST['username'],$_POST['password']);
$objVerLog->checkLogin();
$objVerLog->checkConexion();

/*$objVerificar=new Verificar();
$objVerificar->checkLogin();*/

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
$objUsuario=new Usuarios($_SESSION['idUsuario']);
echo $this->objUsuario->getUsername() . "<br>";
echo $this->objUsuario->getPassword() . "<br>";
echo $this->objUsuario->getEmail() . "<br>";
echo $this->objUsuario->getName() . " " . $this->objUsuario->getSurname() . "<br>";
echo $this->objUsuario->getBirthday() . "<br>";
echo $this->objUsuario->getAddress() . "<br>";
echo $this->objUsuario->getPostal() . "<br>";
echo $this->objUsuario->getTown() . "<br>";
echo $this->objUsuario->getProvince() . "<br>";
echo $this->objUsuario->getMobile() . "<br>";
echo $this->objUsuario->getTelephone() . "<br>";


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
