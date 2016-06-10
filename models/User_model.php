<?php
    # Metodo User_model() que hereda de la clase model
    class User_model extends model
    {
      private $nombre,$clave,$sw,$idi,$rango = array('jlocal','eemp','emp_pioch');                   
      # funcion constructora heredada de model
      function __construct()
      {
          parent::__construct();
      }       
        # metodo red() con 2 parametros para consultar en la base de datos
        function red($nom,$pas)
        {   
            $this->nombre = $nom;
            $this->clave = $pas;            
            $this->consulta();                                                                                                      
        }        
        function consulta()
        {            
           $val=0;              
           $sql = "SELECT * FROM users WHERE CORREO_USER='".$this->nombre."' and PASS_USER = MD5('".$this->clave."');";           
           $con = $this->db->ejecutar($sql);                                            
              if ($row = mysqli_fetch_assoc($con)) 
              {  
                session::setValue('id',$row["ID_USER"]);  
                session::setValue('nom',$row["NOM_USER"]); 
                session::setValue('ap',$row["AP_USER"]); 
                session::setValue('am',$row["AM_USER"]);  
                session::setValue('fono',$row["CEL_USER"]); 
                session::setValue('dir',$row["DIR_USER"]); 
                session::setValue('correo',$row["CORREO_USER"]);
                session::setValue('img',$row["IMG_USER"]);                                                                 
              $this->idi = session::getValue('id'); $val = 1;                                            
              }else{ $val = 0; }             
              if($val == 1){ $this->select(); }else{ header("location:".URL."index/index"); }
        }                                  
        function select()
        {                 
            $val = 0;
            $lis = "";
            while($val < 3)
            {
                    $sql = "SELECT * FROM ".$this->rango[$val]." WHERE ID_USER=".$this->idi."";  
                    $con = $this->db->ejecutar($sql);
                    if ($row = mysqli_fetch_assoc($con)){$lis="listo";break;}else{ $val += 1;}
            }
            if($lis != "listo"){
                    header("location:".URL."index/admin");             
            }else{
                    //header("location:".URL."index/".$this->rango[$val]."");         
                    $this->redir($val);
            }   
            
            
        }
        function redir($val){
            switch($this->rango[$val]){
                case "jlocal":
                     header("location:".URL."index/encargadolocal");             
                    break;
                case "eemp":
                     header("location:".URL."index/encargadoempaque");             
                    break;
                case "emp_pioch":
                    $opc = $this->ep($this->idi);
                    switch($opc){
                        case "0":
                            header("location:".URL."index/empaque");              
                           break;
                        case "1":
                             header("location:".URL."index/piocha");             
                           break;
                        /*default: --- Usar esta opcion para ver errores, ejemplo:
                             header("location:".URL."index/$opc"); <--- mostrar errores por la URL 
                            break;*/
                    }
                    break;
            }
        }
        function ep($id){
            $opc = "";
            $sql = "SELECT TIPO_EP FROM emp_pioch WHERE ID_USER='".$id."';";  
            $con = $this->db->ejecutar($sql);
            if ($row = mysqli_fetch_assoc($con)){$opc = $row["TIPO_EP"];}
            return $opc;
        }
    }    
?>