function VerEnMapa(punto)
{    
    var punto = punto +", Argentina";
    console.log(punto);
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
         $("#id").val(id);
    
  });
}