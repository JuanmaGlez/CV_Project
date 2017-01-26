<?php
session_start();
require_once ("../controller/c_admin.php");
$objAdmin=new Admin($_POST["usuarios"]);

 ?>

 <h1>Modificar datos de los usuario</h1>
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
     $objAdmin->mostrar();
     echo "<br>";
     echo "<input type='submit' name='modificar' value='Modificar'class='btn btn-success'/>";
     if (isset($_POST["desactivar"])){
       $objAdmin->desactivar(true);
       echo "<br>";
     }
     echo"<input type='submit' name='desactivar' value='Desactivar'class='btn btn-success'/>";
     if (isset($_POST["modificar"])){
       $objAdmin->mostrar(); ?>
       <form action="<?PHP $PHP_SELF ?>" method="post" class="col-lg-5">

         <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
       </form>
   }


     <br>
 <?php  }  ?>
<br>
