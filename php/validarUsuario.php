 <?php 

	include_once("../clases/usuario.php");
	include_once("../clases/AccesoDatos.php");

session_start();
	
	$recor = $_POST['recordarme'];
	$usuario = $_POST['usuario'];

if(usuario::validarUsuario($usuario,$_POST['clave']))
{

	$_SESSION['usuarioActual']=$_POST['usuario'];
	
	if($recor)
	{		
	setcookie('registrado', $usuario,  time()+36000 , '/');
	}
	else 
	{
	setcookie('registrado', $usuario,  time()-36000 , '/');
	}

	echo true;

}else
{
	echo  false;
}






?>