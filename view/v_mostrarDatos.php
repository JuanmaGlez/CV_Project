<?php 

	echo $objetoPerfil->objetoUsuario->getRegistro() . "<br>"; 
	echo "<br>";
	echo $objetoPerfil->objetoUsuario->getName() . " " . $objetoPerfil->objetoUsuario->getSurname() . "<br>";
	echo $objetoPerfil->objetoUsuario->getEmail() . "<br>";
	echo $objetoPerfil->objetoUsuario->getDNI() . "<br>"; 
	echo $objetoPerfil->objetoUsuario->getBirthday() . "<br>";
	echo $objetoPerfil->objetoUsuario->getAddress() . ", " . $objetoPerfil->objetoUsuario->getPostal() . " " . $objetoPerfil->objetoUsuario->getTown() . " " . $objetoPerfil->objetoUsuario->getProvince() . "<br>";
	echo $objetoPerfil->objetoUsuario->getMobile() . "<br>";
	echo $objetoPerfil->objetoUsuario->getTelephone() . "<br>";

 ?>