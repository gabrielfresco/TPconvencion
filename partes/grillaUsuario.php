<?php 

if(validadora::TieneSesionValida())
{
	require_once("../clases/usuario.php");
	require_once("../clases/empresa.php");
	require_once("../clases/AccesoDatos.php");
	$usr = usuario::TraerUsuarioPorNombre($_SESSION['usuarioActual']);


 ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>  Nombre     </td>
				<td>  E mail  </td>
				<td>  Empresa  </td>
				<td>  Foto  </td>				
				<td>  Modificar</td>
				<td>  Borrar  </td>
			</tr> 
		</thead>	
		<tbody>
		<?php 


		
		$emp = empresa::TraerEmpresaPorId($usr[0]->idEmpresa);
		$foto= $usr[0]->foto;
		
		echo " 	<tr>";
		echo		"<td>".$usr[0]->nombre."</td>";
		echo		"<td>".$usr[0]->mail."</td>";			
		echo  		"<td>".$emp[0]->nombre."</td>";
		echo		"<td><img height='20' width='20' src='fotos/$foto'></td>";
		echo 		"<td><a id='modificar' class='btn btn-warning' onclick='modificarUsuario(".$usr[0]->id.")'><span class='glyphicon glyphicon-pencil'>&nbsp;</span> Modificar </a></td>";
        echo        "<td><a id='borrar' class='btn btn-danger' onclick='borrarUsuario(".$usr[0]->id.")'><span class='glyphicon glyphicon-trash'>&nbsp;</span> Borrar </a>.</td>";
		echo		"</tr>";

		
		 ?>	
		 </tbody>
</table>
</div>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>