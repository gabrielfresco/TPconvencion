 function login()
        {
        	

        	var elUsuario=$("#nombreUsuario").val();
        	var laClave=$("#contraseña").val();
        	var recordar = $("#recordar").is(':checked');

        	var funcionAjax = $.ajax({url:"validarUsuario.php", type:"POST",
					data:
					{
						usuario: elUsuario,
						clave:laClave,
						recordarme:recordar

					}
				});
				
				funcionAjax.done(function(resultado){
						if(resultado==1)
						{
							
							// window.location="index.php";

						}
						else
						{
							
							alert("Usuario no registrado, reingrese");
						} 
					}); 	
			
        	

        }
        function logout()
        {
        	var funcionAjax=$.ajax({
			url:"logout.php",
			type:"post"		
			});

			funcionAjax.done(function(retorno){				
				$("#nombreUsuario").val("");
				$("#contraseña").val("");							
			
			});	

        } 

      