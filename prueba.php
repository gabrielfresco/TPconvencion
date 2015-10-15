<?php
	include_once("clases/invitado.php");
	include_once("clases/empresa.php");
	include_once("clases/AccesoDatos.php");
	include_once("clases/usuario.php");
		include_once("clases/encriptadora.php");

$usr = usuario::TraerUsuarioPorNombre("Gabifresco09");
$contraEncriptada = encriptadora::Encriptar("valida123");
var_dump($usr[0]->contrasenia);
echo "<br>";
var_dump($contraEncriptada);

?>