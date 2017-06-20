<?php 
	
	$fechaRegistros=$objetoPerfil->objetoUsuario->getRegistro();
	if ($fechaRegistros==null) {
		echo "";
	} else {
    $objetoRegistros = DateTime::createFromFormat('Y-m-d H:i:s', $fechaRegistros);
    $cadenaRegistros = date_format($objetoRegistros, "d/m/Y H:i:s");
    echo $cadenaRegistros ."<br>";}

	//echo $objetoPerfil->objetoUsuario->getRegistro() . "<br>"; 
	echo "<br>";
	echo $objetoPerfil->objetoUsuario->getName() . " " . $objetoPerfil->objetoUsuario->getSurname() . "<br>";
	echo $objetoPerfil->objetoUsuario->getEmail() . "<br>";
	echo $objetoPerfil->objetoUsuario->getDNI() . "<br>"; 

	$fecha=$objetoPerfil->objetoUsuario->getBirthday();
    $objeto = DateTime::createFromFormat('Y-m-d', $fecha);
    $cadena= date_format($objeto, "d/m/Y");
    echo $cadena ."<br>";
	//echo  . "<br>";
	echo $objetoPerfil->objetoUsuario->getAddress() . ", " . $objetoPerfil->objetoUsuario->getPostal() . " " . $objetoPerfil->objetoUsuario->getTown() . " " . $objetoPerfil->objetoUsuario->getProvince() . "<br>";
	echo $objetoPerfil->objetoUsuario->getMobile() . "<br>";
	echo $objetoPerfil->objetoUsuario->getTelephone() . "<br>";

 ?>