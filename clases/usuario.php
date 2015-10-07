<?php
	class usuario
	{
		public $nombre;
		public $contraseña;
		
        public function GetNombre()
        {
            return $this->nombre;

        }

         public function GetContraseña()
        {
            return $this->contraseña;

        }


	 public static function TraerUsuarioPorNombre($nomb)
   		{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL usuarios_TxNombre('$nomb')");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   		}



        public static function validarUsuario($nom, $contra)
        {

            $resultado=  usuario::TraerUsuarioPorNombre($nom); 
            if($resultado[0]->nombre ==$nom && $resultado[0]->contraseña == $contra)
                return true;
            else
                return false;

        }     


	}

?>