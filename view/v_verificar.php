<?php
session_start();
require_once ("../controller/c_verificar.php");
//require_once ("../model/Conectar.php");

if ($_POST["registrar"]=="Registrar") {
  header('location:http://jmgonzalez.com/proyecto_curri4/view/v_registrar.php');
} elseif ($_POST["entrar"]=="Entrar") {
  $objVerificar=new Verificar();
  $objVerificar->checkLogin();
}

 ?>
