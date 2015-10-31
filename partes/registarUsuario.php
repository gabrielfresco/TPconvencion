<article class="post clearfix">

			<header>
				<h2>Registrarse</h2>
			</header>	
				<form onsubmit="GuardarUsuario();return false"  enctype="multipart/form-data">
				<div >
						<table class="table table-striped">
							<thead>
								<tr>
									<td width='25%'>  Nombre de Usuario    </td>
									<td width='25%'>  Contraseña  </td>
									<td width='25%'>  Mail  </td>
									<td width='25%'>  Empresa  </td>
												
								</tr>
						</thead>
							<tbody>	
								<tr>
									<td><input type="text"  minlength="4" title="Se necesita el nombre del usuario" id="nombreUsuario" name="nombre"required autofocus="" pattern="[a-zA-Z]*+" placeholder="Nombre"></td></td>

									<td> <input type="password"  minlength="4"  id="contraseña" title="Ingrese contraseña"  class="form-control" placeholder="Contraseña" pattern="[a-zA-Z0-9]*+" required="" autofocus=""></td>

									<td><input type="email"  id="mail" title="Ingrese un mail"  class="form-control" placeholder="E mail" required  autofocus=""></td>	

												
									<td><select id="empresa" name="empresa"  placeholder="empresa">
											<?php
												require_once("../clases/empresa.php");
												require_once("../clases/AccesoDatos.php");

												$empresas = empresa::TraerTodasLasEmpresas();
												foreach ($empresas as $emp) 
												{
													echo "<option value='$emp->idEmpresa'>$emp->nombre</option>";
												}
											?>
										</select>
									</td>


									 <input type="hidden"  id="idUsuario">						
								</tr>	
							</tbody>						
						</table>	

					</div>	
								Foto<input type="file"  id="foto" title="Debe tener una foto"  class="form-control" required  autofocus="">	
									<input type="submit"  class= "MiBotonUTNInvitado" id="guardarUsuario" value="Registrarse" >
			</form>		

	</article>