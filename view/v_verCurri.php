<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curriculum</title>
	<link rel="stylesheet" type="text/css" href="../view/css/verCurri.css"> 
</head>
<body>
<h1>Curriculum Vitae<h1>

<!--<div class="foto">	
	<img src="/intranet/uploads/<?php  echo $objetoFoto->objetoUsuario->getUsername() . $objetoFoto->objetoUsuario->getIdUsuario() . '/' . $objetoFoto->objetoUsuario->getPhoto(); ?>" alt="Foto Curriculum" width="75">		
</div>

<div class="nombre">
	<h2 ><?php echo $objetoDatosUsuario->objetoUsuario->getName() . " " . $objetoDatosUsuario->objetoUsuario->getSurname(); ?><h2>	
	<p><?php 
		echo $objetoDatosUsuario->objetoUsuario->getEmail() . "<br>";
		echo $objetoDatosUsuario->objetoUsuario->getDNI() . "<br>"; 

		$fecha=$objetoDatosUsuario->objetoUsuario->getBirthday();
    	$objeto = DateTime::createFromFormat('Y-m-d', $fecha);
    	$cadena= date_format($objeto, "d/m/Y");
    	echo $cadena ."<br>";
	
		echo $objetoDatosUsuario->objetoUsuario->getAddress() . ", " . $objetoDatosUsuario->objetoUsuario->getPostal() . " " . $objetoDatosUsuario->objetoUsuario->getTown() . " " . $objetoDatosUsuario->objetoUsuario->getProvince() . "<br>";
		echo $objetoDatosUsuario->objetoUsuario->getMobile() . "<br>";
		echo $objetoDatosUsuario->objetoUsuario->getTelephone() . "<br>";
	 ?><p>
	 <hr>
</div>-->


<div class="profesion">
	<h3>PROFESIÓN<h3>		
	<?php include('v_curriVerProfesion.php'); ?>
	<hr>
</div>


<div class="formacion">
	<h3>FORMACIÓN<h3>
	<?php include('v_curriVerFormacion.php'); ?>
	<hr>
</div>

<div class="otros">
	<h3>OTROS DATOS<h3>
	<?php include('v_curriVerOtros.php'); ?>

</div>

	
</body>
</html>