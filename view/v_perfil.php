<?php
session_start();
require_once ("../controller/c_perfil.php");

$objVerLog=new Perfil($_POST['username'],$_POST['password']);
//$objVerLog->checkLogin();
$objVerLog->checkConexion();

if(isset($_POST["salir"])){
  $objVerLog->closeSession();
}

//date_default_timezone_set('UTC');
//echo date('l jS \of F Y h:i:s A');
?>

<h1>CURRICULUM VITAE</h1>
<h2>Perfil <?php echo $_SESSION['username']?> </h2>
<form action="<?PHP $PHP_SELF ?>" method="post">
  <input type="submit" name="salir" value="Salir">
</form>
<br>
<h3><u>Datos Personales</u></h3>
<form action="v_modificarUsuario.php" method="post">
  <input type="submit" name="modificar" value="Modificar">
</form>
<?php
echo $objVerLog->objUser->getUsername() . "<br>";
echo $objVerLog->objUser->getPassword() . "<br>";
echo $objVerLog->objUser->getEmail() . "<br>";
echo $objVerLog->objUser->getName() . " " . $objVerLog->objUser->getSurname() . "<br>";
echo $objVerLog->objUser->getBirthday() . "<br>";
echo $objVerLog->objUser->getAddress() . ", " . $objVerLog->objUser->getPostal() . " " . $objVerLog->objUser->getTown() . " " . $objVerLog->objUser->getProvince() . "<br>";
echo $objVerLog->objUser->getMobile() . "<br>";
echo $objVerLog->objUser->getTelephone() . "<br>";


if ($_SESSION['idTipoUsuario']==1) {

?>
  <br>
  <p>Vamos por buen camino. Tipo 1 </p>
  <h4><u>Usuarios</u></h4>
  <form action='' method='post'/>
    <select class='lista' name='usuarios'>
      <option value="0">Seleccione</option>
        <?php  $objVerLog->objUser->listarUsuario(); ?>
    </select>
    <input type='submit' name='submit' value='Ver'class='btn btn-success'/>
  </form>


<?php
  //$valor=$_POST["usuarios"];
  if (isset($_POST["usuarios"])){
    $objVerLog->objUser->mostrarUsuario($_POST["usuarios"]);
    echo "<br>";
  }
?>

  <input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Añadir">
  <input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Modificar">
  <input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Desactivar">

<?php
} elseif ($_SESSION['idTipoUsuario']==2) {
  echo "<br>";
  echo "Seguimos por buen caminio. Tipo 2 <br>";
  echo "<h4><u>Datos Académicos</u></h4>";
  echo "<h4><u>Datos Profesionales</u></h4>";
  echo "<h4><u>Otros Datos</u></h4>";
} else {
  echo "<br>";
  echo "Podemos hacer el cambio. Tipo 3 <br>";
  echo "<h4><u>Buscador</u></h4>";
}
 ?>
