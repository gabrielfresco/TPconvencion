

<?php 

if(validadora::TieneSesionValida())
{
	require_once("../clases/invitado.php");
	require_once("../clases/empresa.php");
	require_once("../clases/AccesoDatos.php");
	$invitados = invitado::TraerTodosLosInvitados();


 ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>  Nombre     </td>
				<td>  Apellido  </td>
				<td>  Dni  </td>
				<td>  Sexo  </td>
				<td>  Empresa  </td>
				<td>  Modificar     </td>
				<td>  Borrar  </td>
			</tr> 
		</thead>	
		<tbody>
		<?php 

foreach ($invitados as $inv){
		
		$emp = empresa::TraerEmpresaPorId($inv->idEmpresa);
		
		echo " 	<tr>
					<td>$inv->nombre</td>
					<td>$inv->apellido</td>
					<td>$inv->dni</td>
					<td>$inv->sexo</td>";
		echo  		"<td>".$emp[0]->nombre."</td>";
		echo"		<td><a id='modificar' class='btn btn-warning' onclick=modificarInvitado($inv->id)> Modificar </a></td>
                    <td><a id='borrar' class='btn btn-danger' onclick='borrarInvitado($inv->id)'> Borrar </a></td> 
				</tr>";

	}	
		 ?>	
		 </tbody>
</table>
</div>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>