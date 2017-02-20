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
  <input type="button" onclick=" location.href='v_admin.php' " value="Funciones">
  <!--<form action='v_admin.php' method='post'/>
  <select class='lista' name='usuarios'>
      <option value="0">Seleccione</option>
        <?php //$objVerLog->listar(); ?>
    </select>
    <input type='submit' name='ver' value='Ver'class='btn btn-success'/>
    <input type='submit' name='modificar' value='Modificar'class='btn btn-success'/>
    <input type='submit' name='desactivar' value='Desactivar'class='btn btn-success'/>
  </form>

<?php
  if (isset($_POST["ver"])){
    $objVerLog->mostrar($_POST["usuarios"]);
    echo "<br>";
  }
  if (isset($_POST["desactivar"])){
    $objVerLog->desactivo(true,$_POST["usuarios"]);
    echo "<br>";
  }
  if (isset($_POST["modificar"])){
    $objVerLog->mostrar($_POST["usuarios"]); ?>
    <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">

      <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
    </form>
    <br>
<?php  }
  echo "<br>";
?>-->

<!--<input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Modificar">-->
<!--<input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Desactivar">-->

<?php } elseif ($_SESSION['idTipoUsuario']==2) { ?>
  <br>
  Seguimos por buen caminio. Tipo 2 <br>
  <h4><u>Curriculum</u></h4>
  <form action='v_curriculum.php' method='post'>
    <select class='lista' name='curriculum'>
      <option value="0">Seleccione</option>
        <?php
          //  $objVerLog->listar();
         ?>
    </select>
    <input type='submit' name='submit' value='Ver'class='btn btn-success'/>
  </form>
  <input type="button" onclick=" location.href='v_curriculum.php' " value="Añadir">
  <input type="button" onclick=" location.href='v_curriculum.php' " value="Modificar">
  <input type="button" onclick=" location.href='v_curriculum.php' " value="Borrar">
  <h4><u>Datos Académicos</u></h4>
  <form action='v_datosAcademicos.php' method='post'>
    <input type="submit" name="anadirAca" value="Añadir">
    <input type="submit" name="modificarAca" value="Modificar">
    <input type="submit" name="borrarAca" value="Borrar">
  <h4><u>Datos Profesionales</u></h4>
</form>
  <form action='v_datosProfesionales.php' method='post'>
    <input type="submit" name="anadirPro" value="Añadir">
    <input type="submit" name="modificarPro" value="Modificar">
    <input type="submit" name="borrarPro" value="Borrar">
  </form>
  <h4><u>Otros Datos</u></h4>
  <form action='v_otrosDatos.php' method='post'>
    <input type="submit" name="anadirOtro"  value="Añadir">
    <input type="submit" name="modificarOtro"  value="Modificar">
    <input type="submit" name="borrarOtro"  value="Borrar">
  </form>
<?php } else { ?>
  <br>
  Podemos hacer el cambio. Tipo 3 <br>
  <h4><u>Buscador</u></h4>
  <input type="button" onclick=" location.href='v_modificarUsuario.php' " value="Ver">

<?php }  ?>
