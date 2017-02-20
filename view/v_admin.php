<?php
session_start();
require_once ("../controller/c_admin.php");
$objAdmin=new Admin($_POST["usuarios"]);

 ?>

 <h1>Modificar datos de los usuario</h1>
 <input type="button" onclick=" location.href='v_perfil.php' " value="Volver">
 <br>
 <input type='submit' name='add' value='Añadir'class='btn btn-success'/>
 <form action='v_admin.php' method='post'/>
   <select class='lista' name='usuarios'>
     <option value="0">Usuarios</option>
       <?php $objAdmin->listar(); ?>
   </select>
   <input type='submit' name='ver' value='Ver'class='btn btn-success'/>
 </form>

 <?php
   if (isset($_POST["ver"])){
     $objAdmin->mostrar($_POST["usuarios"]);
     ?>
     <br>
     <form method='post'/>
     <input type='hidden' name='ver' value='Ver'/>
     <input type='hidden' name='mostrar' value='<?php echo $_POST["usuarios"]?>'/>
     <input type='submit' name='<?php echo $_ENV['reves']?>' value='<?php echo $_ENV['reves']?>' class='btn btn-success'/>
     <input type='submit' name='modificar' value='Modificar'class='btn btn-success'/>
     </form>
     <?php
     if (isset($_POST["Desactivar"])){
       $objAdmin->desactivar(true,$_POST['mostrar']);
       echo "<br>";
     } elseif (isset($_POST["Activar"])){
       $objAdmin->activar(false,$_POST['mostrar']);
       echo "<br>";
     }
     if (isset($_POST["modificar"])){
       echo $_POST["mostrar"] . "ok . <br>";
       $objAdmin->mostrar($_POST["mostrar"]); ?>
       <form method="post" class="col-lg-5">
         Tipo usuario: <input type="text" name="tipoUsuario" class="form-control"/> <!--required/>-->
         <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success"/>
       </form>
       <br>
<?php
      echo $_POST["mostrar"] . "ok1" . " " . $_POST['tipoUsuario'];
      if (isset($_POST["Actualizar"])){
        echo "¿Llega?";
        echo $_POST["mostrar"] . "ok2" . " " . $_POST['tipoUsuario'];
        $objAdmin->modificar($_POST['tipoUsuario'],$_POST['mostrar']);
        echo "<br>";
        }
    }

}  ?>
<br>
