<form onsubmit="CambiarContraUsuario();return false">	
	<h4>Mail</h4>
	<input type="email"  id="mail" title="Ingrese un mail"  class="form-control" placeholder="E mail" required  autofocus="">	

	<h4>Nueva Contraseña</h4>
	 <input type="password"  minlength="4"  id="contra" title="Ingrese nueva contraseña"  class="form-control" placeholder="Ingrese nueva contraseña" pattern="[a-zA-Z0-9]*+" required="" autofocus="">

	<h4>Confirme nueva contraseña</h4>
	<input type="password"  minlength="4"  id="contraConfirmar" title="Confirme contraseña"  class="form-control" placeholder="Confirme contraseña" pattern="[a-zA-Z0-9]*+" required="" autofocus="">

	<input type="submit" class="MiBotonUTNInvitado" value="Cambiar contraseña">

</form>