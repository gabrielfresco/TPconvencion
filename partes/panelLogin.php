<?php if(validadora::TieneSesionValida()){ ?>

<h2 id="titulo" class="widgettitle">Panel de control</h2>
			<ul>
				<label  id="lblOculto"> Bienvenido <?php	echo $_COOKIE["registrado"]; ?> </label>		
								
				<a id='Logout' class='btn btn-danger form form-control' onload=""onclick="logout()"><span class='glyphicon glyphicon-off'>&nbsp;</span> LogOut </a>
				<li><a style="cursor:pointer" onclick="Mostrar('CambiarContra')">Cambiar contraseña</a> </li>
			</ul>

<?php }else	{ ?>	
<h2 id="titulo" class="widgettitle">Ingresar</h2>
<ul>
<label  id="lblOculto"></label><br>

<input type="text" id="nombreUsuario" name="nombreUsuario"  placeholder="Nombre de usuario">
<input type="password" id="contraseña" placeholder="contraseña"  name="contraseña"><br>

<label>
	<li id="lblRecordar"><input type="checkbox" id="recordar">Recordame</li>				
</label>

<a id='Login' class='btn btn-info form form-control' onclick="login()"><span class='glyphicon glyphicon-ok'>&nbsp;</span> LogIn </a>
<a id='Registrarse' class='btn btn-info form form-control' onclick="Mostrar('RegistrarUsuario')"><span class='glyphicon glyphicon-home'>&nbsp;</span> Registrarse </a>
</ul>
<?php } ?>		
						
