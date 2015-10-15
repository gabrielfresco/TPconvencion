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
		$usr->contrasenia = $contraEncriptada; 
		$usr->mail = $_POST['mail'];		
		$usr->idEmpresa = $_POST['empresa'];
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

	case 'CambiarContra':
			include("../partes/cambiarContra.php");
			break;

	case 'TraerInvitado':
			$invitado = invitado::TraerInvitadoPorId($_POST['id']);		
			echo json_encode($invitado[0]);
		break;

	case 'TraerUsuario':
			$usr = usuario::TraerUsuarioPorId($_POST['id']);		
			echo json_encode($usr[0]);
		break;

	case 'TraerUsuarioPorMail':
			$usr = usuario::TraerUsuarioPorMail($_POST['mail']);
			if($_POST['contra']== $_POST['contra2'])
			{
			$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;	
			$usr[0]->contrasenia = $contraEncriptada;	
			$usr[0]->modificarContra();
			echo true;
			}
			else
				echo false;
		break;
			
	default:
		# code...
		break;
}

?>