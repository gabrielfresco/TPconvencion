<?php
require_once("clases/validadora.php");
//require_once"partes/referencias.php";
?>

<!doctype html>
<html lang="en">
<head>

<title><font size="100">Convencion</font></title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width initial-scale=1.0">


<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">


<link rel="stylesheet" type="text/css" href="css/bootstrap.css" >
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>
<script type="text/javascript" src="js/funcionesAJAX.js"></script>
<script type="text/javascript" src="js/funcionesLOGIN.js"></script>
<script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
<script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
<script type="text/javascript" src="js/funcionesMapa.js"></script>

        

</head>

<body onload="Mostrar('MostrarIndex')">

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo">Convencion</h1>			
		</hgroup>

		<nav>
			<ul id="main-nav" class="clearfix">
				<!-- li><a href="index.php">Inicio</a></li> -->
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarIndex')"><span class='glyphicon glyphicon-home'>&nbsp;</span>Inicio</a> </li>			
				<li><a style="cursor:pointer" onclick="Mostrar('RegistrarInvitado')"><span class='glyphicon glyphicon-th-list'>&nbsp;</span>Registrar Invitado</a> </li>	
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarGrilla')"><span class='glyphicon glyphicon-th-list'>&nbsp;</span>Mostrar Grilla</a> </li>	
				<li><a style="cursor:pointer" onclick="VerEnMapa('Buenos Aires, Avellaneda, Mitre 750')"><span class='glyphicon glyphicon-road'>&nbsp;</span>Ubicacion</a> </li>
				
				<li><a style="cursor:pointer" onclick="Mostrar('VerPerfil')"><span class='glyphicon glyphicon-user'>&nbsp;</span>Ver perfil</a> </li>	

				
							
			</ul>
			<!-- /#main-nav --> 
		</nav>

		

	</header>
	<!-- /#header -->
	
	<div id="content">

		
		<!-- /#content --> 

	</div>
	
	
	
	<aside id="sidebar">

		


		<section class="widget">
			<h2 id="titulo" class="widgettitle">Panel de control</h2>
			<ul>
				<h4 id="lblOculto"></h4>
				
				<input type="text" id="nombreUsuario" name="nombreUsuario"  placeholder="Nombre de usuario" value="<?php
					if(isset($_COOKIE["registro"])){echo $_COOKIE["registrado"];}?>">

				<input type="password" id="contraseña" placeholder="contraseña"  name="contraseña"><br>
			<label>
				<li id="lblRecordar"><input type="checkbox" id="recordar">Recordame</li>
				
			</label>
								
				
				<a id='Login' class='btn btn-info form form-control' onclick="login()"><span class='glyphicon glyphicon-ok'>&nbsp;</span> LogIn </a>
				<a id='Registrarse' class='btn btn-info form form-control' onclick="Mostrar('RegistrarUsuario')"><span class='glyphicon glyphicon-home'>&nbsp;</span> Registrarse </a>
				<a id='Logout' class='btn btn-info form form-control' onload=""onclick="logout()"><span class='glyphicon glyphicon-off'>&nbsp;</span> LogOut </a>
				<li><a style="cursor:pointer" onclick="Mostrar('CambiarContra')">Cambiar contraseña</a> </li>
			</ul>
		</section><!-- /.widget -->
	

		<section  class="widget clearfix" id="quejas">
			<h2>Informar problema</h2>
			<form  onsubmit="insertarQueja(); return false">
				<div class="form-group">
					<label>Correo electronico</label>
					<input  class="form form-control" title="Ingrese su correo por favor"  type="email"  name="emailQueja" id="emailQueja" required>	
				</div>

				<div class="form-group">
					<label>Problema</label>
					<textarea class="form form-control" required title="Detalle su problema" rows="3" maxlength="200" id="problema">
					</textarea>
				</div>


				<div class="form-group">
					<button type="submit" class= "btn btn-danger form form-control" id="GuardarQueja">
							<span class='glyphicon glyphicon-envelope'>&nbsp;</span>Informar
					</button>					 
				</div>
				
			</form>
			
		</section>

		
						
	</aside>	
	
</div>
<!-- /#pagewrap -->

</body>
</html>