<?php
	 class invitado
	{
		public $id;
        public $nombre;
		public $apellido;
		public $dni;
		public $idEmpresa;
        public $sexo;

   
	 public static function TraerTodosLosInvitados()
   		{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL invitados_TT");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado"); 

   		}

    public static function TraerInvitadoPorId($param)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL invitadoTxId('$param')");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "invitado"); 

        }



    public function InsertarInvitadoConParametros()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("CALL insertarInvitados(:paramNombre,:paramApellido,:paramDni,:paramSexo,:paramnIdEmpresa)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramApellido', $this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':paramDni', $this->dni, PDO::PARAM_INT);
                $consulta->bindValue(':paramSexo', $this->sexo, PDO::PARAM_STR);
                $consulta->bindValue(':paramnIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
 

    public function BorrarInvitado()
     {

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL borrarInvitado(:paramId)");
            $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);                     
            $consulta->execute();
             return $consulta->rowCount();

     }
        
    
     public function ModificarInvitadoParametros()
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL modificarInvitado(:paramId,:paramNombre,:paramApellido,:paramDni,:paramSexo,:paramIdEmpresa)");
           $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);
           $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
           $consulta->bindValue(':paramApellido', $this->apellido, PDO::PARAM_STR);
           $consulta->bindValue(':paramDni', $this->dni, PDO::PARAM_INT);
           $consulta->bindValue(':paramSexo', $this->sexo, PDO::PARAM_STR);
           $consulta->bindValue(':paramIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
        
            return $consulta->execute();
     }

     public function GuardarInvitado()
     {
        if($this->id>0)
             $this->ModificarInvitadoParametros();
        else           
        $this->InsertarInvitadoConParametros();


     }


     

    public static function tabla($nombre){
        $invitados = self::TraerTodosLosInvitados();

        $contador1=0;
        $contador2=0;
        $contador3=0;

        foreach ($invitados as $inv) {
           if($inv->idEmpresa ==1)
            $contador1 = $contador1+1;
            else if($inv->idEmpresa ==2)
             $contador2 = $contador2+1;
            else
                $contador3 = $contador3+1;
        }


            echo "<table id=\"$nombre\">";
            echo "<tr><td>Empresa</td><td>Cantidad</td></tr>";
            
            include("empresa.php");
            
            $empresas =empresa::TraerTodasLasEmpresas();

            foreach ($empresas as $emp) {
                echo "<tr>";

                echo "<td>$emp->nombre</td>";
                if($emp->idEmpresa==1)                
                    echo "<td>$contador1</td>";                
                else if($emp->idEmpresa ==2)
                    echo "<td>$contador2</td>";
                    else
                        echo "<td>$contador3</td>";
                echo "</tr>";
            }
            
        echo "</table>";
    }
	
}
?>