

<?php 
session_start();
if(isset($_SESSION['usuarioActual']))
{
	

	

?>
	<article class="post clearfix">

			<header>
				<h2>Informacion del Invitado</h2>
			</header>	
				<form onsubmit="GuardarInvitado();return false">
				<div class="miTabla">
						<table>
							
								<tr>
									<td width='22%'>  Nombre     </td>
									<td width='22%'>  Apellido  </td>
									<td width='20%'>  Dni  </td>
									<td width='12%'>  Sexo  </td>
									<td width='24%'>  Empresa  </td>				
								</tr> 
								<tr>
									<td><input type="text" minlength="4" title="Se necesita el nombre del invitado" id="nombreInvitado" name="nombre"required autofocus="" pattern="[a-zA-Z]*+" placeholder="Nombre"></td></td>

									<td> <input type="text"  minlength="4"  id="apellidoInvitado" title="Se necesita el apellido del invitado"  class="form-control" placeholder="Apellido" pattern="[a-zA-Z]*+" required="" autofocus=""></td>

									<td><input type="number" min="1000000" max="99999990" minlength="7"  id="dniInvitado" title="Se el dni del invitaado"  class="form-control" placeholder="Dni" required  autofocus=""></td>	

									<td> <input type="radio" id="masculino" name="sexo" value="M" checked> M<input type="radio" id="femenino" name="sexo" value="F">F</td>			
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
									 <input type="hidden"  id="idInvitado">						
								</tr>							
						</table>								
					</div>	
					
									<input type="submit"  class= "MiBotonUTNInvitado" id="agregarInvitado" value="Agragar invitado" >
			</form>		

	</article>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>
		<!-- /.post -->

	