<?php
	include_once("clases/invitado.php");
	include_once("clases/empresa.php");
	include_once("clases/AccesoDatos.php");
	include_once("clases/usuario.php");

$inv = invitado::TraerInvitadoPorId(44);



var_dump($inv);

?>