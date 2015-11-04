<?php
	
    class usuario
	{
		public $nombre;
		public $contrasenia;
        public $mail;
        public $id;
        public $idEmpresa;
        public $foto;

		

	 public static function TraerUsuarioPorNombre($nomb)
   		{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL usuarios_TxNombre('$nomb')");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   		}



        public static function validarUsuario($nom, $contra)
        {
            
            $resultado =  usuario::TraerUsuarioPorNombre($nom); 

           if($resultado !=null)
           {
            if($resultado[0]->nombre == $nom && $resultado[0]->contrasenia == $contra)
                return true;            
               else
                return false;
            }
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

           public static function TraerUsuarioPorMail($mail)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL usuarioTxMail('$mail')");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

        }



    public function InsertarUsuarioConParametros()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("CALL insertarUsuario(:paramNombre,:paramContrasenia,:paramMail,:paramnIdEmpresa, :paramFoto)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramContrasenia', $this->contrasenia, PDO::PARAM_STR);
                $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_INT);              
                $consulta->bindValue(':paramnIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
                $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);
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
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL modificarUsuario(:paramId,:paramNombre,:paramContrasenia,:paramMail,:paramIdEmpresa, :paramFoto)");
           $consulta->bindValue(':paramId', $this->id, PDO::PARAM_INT);
           $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
           $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);    
           $consulta->bindValue(':paramContrasenia', $this->contrasenia, PDO::PARAM_STR);
           $consulta->bindValue(':paramIdEmpresa', $this->idEmpresa, PDO::PARAM_INT);
           $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);
        
            return $consulta->execute();
     }

     public function modificarContra()
     {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("CALL modificarContra(:paramMail,:paramContra)");       
           $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);    
           $consulta->bindValue(':paramContra', $this->contrasenia, PDO::PARAM_STR);
        
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