function Mostrar(queMostrar)
{
	
	var funcionAjax=$.ajax({
		url:"php/operaciones.php",
		type:"post",
		data:{queHago:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#content").html(retorno);
			
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

