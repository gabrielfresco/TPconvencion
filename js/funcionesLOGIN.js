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
							$("#titulo").html("Usuario Logueado");
							$("#informe").html("Bienvenido " + elUsuario);
							// window.location="index.php";

						}
						else
						{
							$("#informe").show();
							$("#informe").html("Usuario no registrado");
							//alert("Usuario no registrado, reingrese");
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
				$("#usuarioLogueado").hide();
				$("#titulo").html("Ingresar");		
				$("#nombreUsuario").val("");
				$("#contraseña").val("");
				$("#informe").hide();							
			
			});	

        } 

      