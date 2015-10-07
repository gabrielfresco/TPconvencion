<?php
	class empresa
	{
		public $idEmpresa;
		public $nombre;
		
        public function GetNombre()
        {
            return $this->nombre;

        }

         public function GetIdEmpresa()
        {
            return $this->idEmpresa;

        }



     public static function TraerTodasLasEmpresas()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL empresas_TT");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "empresa"); 

        }     

     public static function TraerEmpresaPorId($valor)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL empresas_TxId('$valor')");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "empresa"); 

        }    

	}

?>