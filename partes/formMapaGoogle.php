 <div id="contenedor">
 	  <form class = "form-inline">
         <div class="form-group">
            <input class="form-control" type="text"  id="provincia" placeholder="Provincia">
            <input class="form-control" type="text"  id="localidad" placeholder="Localidad">
            <input class="form-control" type="text"  id="direccion" placeholder="Direccion">

            <button type="button" onclick='VerEnMapa()' class= "btn btn-info">
    			<span class='glyphicon glyphicon-search'>&nbsp;</span>Buscar
    		</button>      	
         </div>
	   </form>

        <div id="mostrarMapa" style="height: 650px;">
             <script async defer src="https://maps.google.com/maps/api/js?signed_in=true&callback=Geolocalizacion.Marcador.iniciar"></script>
        </div>
        
     <input type="hidden" name="punto" id="punto" readonly>
     <input type="hidden" name="id" id="id" readonly>
</div>
