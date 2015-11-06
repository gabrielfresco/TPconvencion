 function login()
        {
        	

        	var elUsuario=$("#nombreUsuario").val();
        	var laClave=$("#contraseña").val();
        	var recordar = $("#recordar").is(':checked');

        	var funcionAjax = $.ajax({url:"php/operaciones.php", type:"POST",
					data:
					{
						queHago:"ValidarUsuario",
						usuario: elUsuario,
						clave:laClave,
						recordarme:recordar

					}
				});
				
				funcionAjax.done(function(resultado){
						console.log(resultado);
						if(resultado)
						{
							 $("#contraseña").hide();
							 $("#recordar").hide();
							 $("#nombreUsuario").hide();
							 $("#lblRecordar").hide();
							 $("#Login").hide();
							 $("#Registrarse").hide();
							  $("#lblOculto").hide();
							  
							 $("#titulo").html("Bienvenido " + elUsuario);
							
							
							

						}
						else
						{
							$("#info").show();
							$("#lblOculto").html("Usuario no registrado");
							
						} 
					}); 	
			
        	

        }
        function logout()
        {
        	var funcionAjax=$.ajax({
			url:"php/logout.php",
			type:"post"		
			});

			funcionAjax.done(function(retorno){	
				$("#contraseña").show();					
				$("#recordar").show();
				$("#nombreUsuario").show();
				$("#lblRecordar").show();
				$("#Login").show();	
				$("#Registrarse").show();
				$("#usuarioLogueado").hide();
				$("#lblOculto").hide();
				$("#titulo").html("Panel de control");		
				$("#nombreUsuario").val("");
				$("#contraseña").val("");
				$("#info").hide();							
			
			});	

        } 

      