 function GuardarInvitado()
        {
        	var id = $("#idInvitado").val();
        	var nombre=$("#nombreInvitado").val();
        	var apellido=$("#apellidoInvitado").val();
        	var dni=$("#dniInvitado").val();
        	var emp=$("#empresa").val();
        	var sexo=$('input:radio[name=sexo]:checked').val();
        	        	
        	
        	
        		var funcionAjax = $.ajax({url:"php/operaciones.php", type:"post",
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
		  	  
		  var funcionAjax = $.ajax({ type:"post",url:"php/operaciones.php",
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

function modificarUsuario(valor)
		{	
			Mostrar('RegistrarUsuario');
			 		
			
			var funcionAjax = $.ajax({
					url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"TraerUsuario",
						id:valor

					}
				});
				


			   		funcionAjax.done(function(resultado){	

			  			var usr = JSON.parse(resultado);
						
						alert(usr.sexo);
			 		 	$("#idUsuario").val(usr.id);
			 		 	$("#nombreUsuario").val(usr.nombre);
						$("#mail").val(usr.mail);		 								
			 		 	$("#contraseña").val(usr.contraseña);
			 		 	$("#empresa").val(usr.idEmpresa);
																		
					});
						
							
			 		funcionAjax.fail(function(resultado){	
			 			alert("No se ha modificado");
		
			 		});						
		}


 function GuardarUsuario()
        {
        	var id = $("#idUsuario").val();
        	var nombre=$("#nombreUsuario").val();
        	var mail=$("#mail").val();
        	var contra=$("#contraseña").val();
        	var emp=$("#empresa").val();
        	
        	        	
        	
        	
        	var funcionAjax = $.ajax({url:"php/operaciones.php", type:"post",
					data:
					{
						id:id,
						nom: nombre,
						mail:mail,						
						contra: contra,
						empresa: emp,
						queHago:"GuardarUsuario"

				}
			});

        		funcionAjax.done(function(resultado){

						console.log(resultado);						
						Mostrar('RegistrarUsuario');														
					});
						
							
					funcionAjax.fail(function(resultado){	
						alert("No se ha dado de alta");
		
					});	
        	
        	}



