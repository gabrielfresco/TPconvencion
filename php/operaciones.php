<?php

	require_once("../clases/invitado.php");
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/encriptadora.php");
	require_once("../clases/usuario.php");
	require_once("../clases/validadora.php");
	require_once("../clases/quejas.php");

	
$quehago = $_POST['queHago'];

switch ($quehago) {
	case 'borrar':
		$inv = new invitado();
		$inv->id = $_POST['id'];
		$resultado = $inv->BorrarInvitado();
		echo $resultado;
		break;

	case 'borrarUsuario':
		$usr = new usuario();
		$usr->id = $_POST['id'];
		$resultado = $usr->BorrarUsuario();
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

	case 'GuardarQueja':
		$queja = new queja();
		$queja->problema = $_POST['problema'];
		$queja->fecha = date('y-m-d');
		$queja->mail = $_POST['email'];			
		$cantidad = $queja->InsertarQueja();

		echo true;
		break;

	case 'GuardarUsuario':
		// $tamanio =$_FILES['foto']['size'];
  //   		if($tamanio>1024000)
  //   		{
  //   				echo "Error: archivo muy grande!"."<br>";
  //   				break;
  //   		}
  //   		else
  //   		{
  //   			//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
		// 		//IMAGEN, RETORNA FALSE
		// 		$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
		// 		if($esImagen === FALSE) 
		// 		{
		// 			echo "Error: No es una imagen!"."<br>";
  //   				break;
		// 		}
		// 		else
		// 		{
		// 			$NombreCompleto=explode(".", $_FILES['foto']['name']);
		// 			$Extension=  end($NombreCompleto);
		// 			$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
		// 			if(!in_array($Extension, $arrayDeExtValida))
		// 			{
		// 			   echo "Error: Extension no valida!"."<br>";
  //   				   break;
		// 			}
		// 			else
		// 			{
		// 				//$destino =  "fotos/".$_FILES["foto"]["name"];
		// 				$destino = "fotos/". $_FILES['foto']['name'];//.".".$Extension;
		// 				$foto=$_POST['dni'].".".$Extension;
		// 				//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
  //   					if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
  //   					{		
  //     						// echo "ok";
  //     					} 			

		// 			}
		// 		}
		// 	}



		$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;
		$usr = new usuario();
		$usr->id = $_POST['id'];
		$usr->nombre = $_POST['nom'];		
		$usr->contrasenia = $contraEncriptada; 
		$usr->mail = $_POST['mail'];		
		$usr->idEmpresa = $_POST['empresa'];
		$usr->foto = "piedra.jpg";//$_FILES['foto']['name'];
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
			if($usr!= null)
			{
			if($_POST['contra']== $_POST['contra2'])
			{
			$contraEncriptada = encriptadora::Encriptar($_POST['contra']);;	
			$usr[0]->contrasenia = $contraEncriptada;	
			$usr[0]->modificarContra();
			echo true;
			}
			else
				echo false;
			}
			else 
				echo false;
		break;

	case 'ValidarUsuario':
			$contraEncriptada = encriptadora::Encriptar($_POST['clave']);
			$respuesta = validadora::validarUsuario($_POST['usuario'], $contraEncriptada ,$_POST['recordarme']);
			if($respuesta)
				echo true;
			else 
				echo false;
			break;

	case 'VerPerfil':
				include("../partes/perfilUsuario.php");
			break;	
			
		break;

			
	default:
		# code...
		break;
}

?>