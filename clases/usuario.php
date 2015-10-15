<?php
	class usuario
	{
		public $nombre;
		public $contraseña;
        public $mail;
        public $id;
        public $idEmpresa;
		
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



         public static function TraerUsuarioPorId($param)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL usuarioTxId('$param')");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

        }



    public function InsertarUsuarioConParametros()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("CALL insertarUsuario(:paramNombre,:paramContraseña,:paramMail,:paramnIdEmpresa)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramContraseña', $this->contraseña, PDO::PARAM_STR);
                $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_INT);              
                $consulta->bindValue(':paramnIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
 

    public function BorrarUsuario()
     {

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL borrarUsuario(:paramId)");
            $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);                     
            $consulta->execute();
             return $consulta->rowCount();

     }
        
    
     public function ModificarUsuarioConParametros()
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL modificarUsuario(:paramId,:paramNombre,:paramContraseña,:paramMail,:paramIdEmpresa)");
           $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);
           $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
           $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);    
           $consulta->bindValue(':paramContraseña', $this->contraseña, PDO::PARAM_STR);
           $consulta->bindValue(':paramIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
        
            return $consulta->execute();
     }

     public function GuardarUsuario()
     {
        if($this->id>0)
             $this->ModificarUsuarioConParametros();
        else           
        $this->InsertarUsuarioConParametros();


     }  


	}

?>