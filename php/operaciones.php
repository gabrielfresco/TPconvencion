<?php

	require_once("../clases/invitado.php");
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/encriptadora.php");
	require_once("../clases/usuario.php");
	
$quehago = $_POST['queHago'];

switch ($quehago) {
	case 'borrar':
		$inv = new invitado();
		$inv->id = $_POST['id'];
		$resultado = $inv->BorrarInvitado();
		echo $resultado;
		break;

	case 'GuardarInvitado':
		$inv = new invitado();
		$inv->id = $_POST['id'];
		$inv->nombre = $_POST['nom'];
		$inv->apellido = $_POST['ape'];
		$inv->dni = $_POST['dni'];
		$inv->sexo = $_POST['sexo'];
		$inv->idEmpresa = $_POST['idEmp'];
		$cantidad = $inv->GuardarInvitado();

		echo true;
		break;

	case 'GuardarUsuario':
		$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;
		$usr = new usuario();
		$usr->id = $_POST['id'];
		$usr->nombre = $_POST['nom'];		
		$usr->contraseña = $contraEncriptada; 
		$usr->mail = $_POST['mail'];		
		$usr->idEmpresa = $_POST['emp'];
		$cantidad = $usr->GuardarUsuario();

		echo true;
		break;


	case 'MostrarGrilla':
			include("../partes/grilla.php");
			break;

	case 'RegistrarUsuario':
			include("../partes/registarUsuario.php");
			break;
			

	case 'VerEnMapa':
			include("../partes/formMapaGoogle.php");
			break;

	case 'MostrarIndex':
			include("../partes/inicio.php");	
			break;

	case 'RegistrarInvitado':
			include("../partes/registrarInvitado.php");
			break;

	case 'TraerInvitado':
			$invitado = invitado::TraerInvitadoPorId($_POST['id']);		
			echo json_encode($invitado[0]);
		break;

	case 'TraerUsuario':
			$invitado = usuario::TraerUsuarioPorId($_POST['id']);		
			echo json_encode($invitado[0]);
		break;
			
	default:
		# code...
		break;
}

?>