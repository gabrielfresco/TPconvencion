 function GuardarInvitado()
        {
        	var id = $("#idInvitado").val();
        	var nombre=$("#nombreInvitado").val();
        	var apellido=$("#apellidoInvitado").val();
        	var dni=$("#dniInvitado").val();
        	var emp=$("#empresa").val();
        	var sexo=$('input:radio[name=sexo]:checked').val();
        	        	
        	
        	
        		var funcionAjax = $.ajax({url:"operaciones.php", type:"post",
					data:
					{
						id:id,
						nom: nombre,
						ape:apellido,
						dni:dni,
						idEmp: emp,
						sexo: sexo,
						queHago:"GuardarInvitado"

				}
			});

        		funcionAjax.done(function(resultado){

						console.log(resultado);						
						Mostrar('RegistrarInvitado');														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha dado de alta");
		
					});	
        	
        	}



   function borrarInvitado(valor)
		{
		  	  
		  var funcionAjax = $.ajax({ type:"post",url:"operaciones.php",
					data:
					{
						queHago:"borrar",
						id:valor

					}
				});

					funcionAjax.done(function(resultado){

						console.log(resultado);						
						Mostrar('MostrarGrilla');														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha borrado");
		
					});		 	
			
		}

function modificarInvitado(valor)
		{	
			
			var funcionAjax = $.ajax({
					url:"operaciones.php", type:"POST",
					data:
					{
						queHago:"TraerInvitado",
						id:valor

					}
				});
				


			  		funcionAjax.done(function(resultado){			  			
			  			
						var inv =JSON.parse(resultado);
						
						
						$("#idInvitado").val(inv.id);
						$("#nombreInvitado").val(inv.nombre);
						$("#apellidoInvitado").val(inv.apellido);
						// if(inv.sexo='M')
						// 	{
						// 		$('#masculino').attr('checked', true);
						// 	}
						// 	else
						// 	{
						// 		$('#femenino').attr('checked', true);
						// 	}
								
						// $("#dniInvitado").val(inv.dni);
						// $("#empresa").val(inv.idEmpresa);
						
												
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha modificado");
		
					});	

					Mostrar('RegistrarInvitado');
								

					
		}
