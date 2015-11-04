<?php
require_once("clases/validadora.php");
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width initial-scale=1.0">

<title>Convencion</title>

 <link rel="stylesheet" type="text/css" href="css/estilo.css">
 <!--  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
 <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="application/x-font-ttf" href="css/fonts/glyphicons-halflings-regular.ttf">
  <link rel="stylesheet" type="application/x-font-woff" href="css/fonts/glyphicons-halflings-regular.woff">
  <link rel="stylesheet" type="application/octet-stream" href="css/fonts/glyphicons-halflings-regular.woff2">
  <link rel="stylesheet" type="application/vnd.ms-fontobject" href="css/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="application/octet-stream" href="css/fonts/glyphicons-halflings-regular.woff2">

<!-- main css -->
 <link href="css/style.css" rel="stylesheet" type="text/css">
<!-- media queries css -->
<link href="css/media-queries.css" rel="stylesheet" type="text/css">


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
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarIndex')">Inicio</a> </li>			
				<li><a style="cursor:pointer" onclick="Mostrar('RegistrarInvitado')">Registrar Invitado</a> </li>	
				<li><a style="cursor:pointer" onclick="Mostrar('MostrarGrilla')">Mostrar Grilla</a> </li>	
				<li><a style="cursor:pointer" onclick="VerEnMapa('Buenos Aires, Avellaneda, Mitre 750')">Ubicacion</a> </li>
				<li class="miLi">
					<select onchange="Perfil('<?php echo $_SESSION['usuarioActual'];?>')" class="form form-control" id="perfilUsuario" name="perfilUsuario">
						<option value="VerPerfil">Ver perfil</option>
						<option value="ModificarUsuario">Modificar</option>						
					</select>
				</li>
				<li><a style="cursor:pointer" onclick="Mostrar('VerPerfil')">Ver perfil</a> </li>	
				
							
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
			<h2 id="titulo" class="widgettitle">Ingresar</h2>
			<ul>
				<h4 id="lblOculto"></h4>
				
				<input type="text" id="nombreUsuario" name="nombreUsuario"  placeholder="Nombre de usuario" value="<?php
					if(isset($_COOKIE["registro"])){echo $_COOKIE["registrado"];}?>">

				<input type="password" id="contraseña" placeholder="contraseña"  name="contraseña"><br>
			<label>
				<li id="lblRecordar"><input type="checkbox" id="recordar">Recordame</li>
				
			</label>
				<input type="button" class= "MiBotonUTN" id="Logout" onclick="logout()" value="LogOut">
				<input type="button" class= "MiBotonUTN" id="Login" onclick="login()" value="LogIn">				
				<input type="button" class= "MiBotonUTN" id="Registrarse" onclick="Mostrar('RegistrarUsuario')" value="Registrarse">
				
				
				<li><a style="cursor:pointer" onclick="Mostrar('CambiarContra')">Cambiar contraseña</a> </li>
			</ul>
		</section><!-- /.widget -->
	

		<section  class="widget clearfix" id="quejas">
			<h4>Informar problema</h4>
			<form >
				<div class="form-group">
					<label>Correo electronico</label>
					<input  class="form form-control" title="Ingrese su correo por favor"  type="email"  name="emailQueja" id="emailQueja" required>	
				</div>

				<div class="form-group">
					<label>Problema</label>
					<textarea class="form form-control" title="Detalle su problema"  rows="4" cols="50" maxlength="200" id="problema" required >
					</textarea>
				</div>


				<div class="form-group">
					  <input type="button" class= "MiBotonUTN" id="GuardarQueja" value="Informar" onclick="insertarQueja()">
				</div>
				
			</form>
			
		</section>

		
						
	</aside>	
	
</div>
<!-- /#pagewrap -->

</body>
</html>