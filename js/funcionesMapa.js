function VerEnMapa()
{    
  var provincia = $("#provincia").val();
  var localidad = $("#localidad").val()
  var direccion = $("#direccion").val();
  
  if(provincia !=null)
  {
    var punto = provincia+","+ localidad+","+direccion+", Argentina";
    console.log(punto);
    }
    else
   var punto = "Buenos Aires,Avellaneda, Mitre 750, Argentina";

    var funcionAjax=$.ajax({
    url:"php/operaciones.php",
    type:"post",
    data:{
      queHago:"VerEnMapa"
    }
  });
    funcionAjax.done(function(retorno){
    $("#content").html(retorno);
        $("#punto").val(punto);
      //  $("#ID").val(id);
    
  });
}