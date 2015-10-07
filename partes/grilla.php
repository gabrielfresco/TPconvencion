
<?php 
session_start();
if(isset($_SESSION['usuarioActual']))
{
	require_once("clases/invitado.php");
	require_once("clases/empresa.php");
	require_once("clases/AccesoDatos.php");
	$invitados = invitado::TraerTodosLosInvitados();


 ?>
 <div class="miTabla">
	<table>
		
			<tr>
				<td width='15%'>  Nombre     </td>
				<td width='15%'>  Apellido  </td>
				<td width='15%'>  Dni  </td>
				<td width='5%'>  Sexo  </td>
				<td width='20%'>  Empresa  </td>
				<td width='15%'>  Modificar     </td>
				<td width='15%'>  Borrar  </td>
			</tr> 


		<?php 

foreach ($invitados as $inv){
		
		$emp = empresa::TraerEmpresaPorId($inv->idEmpresa);
		
		echo " 	<tr>
					<td>$inv->nombre</td>
					<td>$inv->apellido</td>
					<td>$inv->dni</td>
					<td>$inv->sexo</td>";
		echo  		"<td>".$emp[0]->nombre."</td>";
		echo"		<td><a id='modificar' class='MiBotonUTNlistado' onclick=modificarInvitado($inv->id)> Modificar </a></td>
                    <td><a id='borrar' class='MiBotonUTNlistado' onclick='borrarInvitado($inv->id)'> Borrar </a></td> 
				</tr>";

	}	
		 ?>	
</table>
</div>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>