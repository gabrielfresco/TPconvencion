<?php 

	class estadistica
	{

		public $nombre;
		public $Cantidad;

		public static function TraerEstadisticas()
		{

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerEstadisticas");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "estadistica");
		}

		  public static function tabla($nombre)
		  {  
             
             $estadisticas = self::TraerEstadisticas();
              echo "<table id='tabla'>";

             foreach ($estadisticas as $value)
              {
             		
              	echo "<tr>
                		<td>$value->nombre</td>           
                   		<td>$value->Cantidad</td>
                  	</tr>";
           	 	}
            
        		echo "</table>";
                                                     
          }                                          
          
    }
//funcionan bien todos los metodos, ya los probe por separado pero en el foreach por alguna razon no mete un registro en la tabla, siempre muestra 1 fila menos
	

?>