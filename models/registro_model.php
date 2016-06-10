<?php

   class registro_model extends model
    {
        private $iduser,$idhor;
            # funcion constructora heredada de model
              function __construct()
              {
                  parent::__construct();
              }       
       function registrar($dato)
       {    
        $imagen = $dato['imagen'];   
        $nombre = $dato['nombre'];
        $apaterno = $dato['apaterno'];
        $amaterno = $dato['amaterno'];
        $fono = $dato['fono'];
        $direccion = $dato['direccion'];
        $email = $dato['email'];
        $pass = $dato['pass'];
        $tipo = $dato['tipo'];  
        $estado = $dato['estado'];  
           
        $this->db->ejecutar("INSERT INTO users(CORREO_USER,PASS_USER,NOM_USER,AP_USER,AM_USER,DIR_USER,ESTADO_USER,IMG_USER,CEL_USER)
        VALUES('".$email."','".$pass."','".$nombre."','".$apaterno."','".$amaterno."','".$direccion."',".$estado.",'".$imagen."',".$fono.")");           
         $this->usuario($tipo);                               
       }       
       function usuario($tipo)
       {             
         $result = $this->db->ejecutar("SELECT MAX(ID_USER) as ID_USER FROM users");
         while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $this->iduser = $fila["ID_USER"];             
        }
           $this->db->ejecutar("INSERT INTO ".$tipo."(ID_USER) VALUES(".$this->iduser.")");
       }       
       function actualizar_img($datos)
       {
           $id = session::getValue('id');
           $img = $datos['img'];
           $this->db->ejecutar("UPDATE usuario SET IMGUSUARIO ='".$img."' WHERE IDUSUARIO = ".$id."" );
       }
       function ingresar_horas($dat)
       {
           $hi = $dat['horain'];
           $ho = $dat['horaout'];
           $this->db->ejecutar("INSERT INTO horario(IN_HORARIO,OUT_HORARIO)VALUES('".$hi."','".$ho."')");                    
        }
      function ingresar_turno($datos)
       {
            $fecha_turno = $datos['fecha_turno'];
            $cant = $datos['cant'];
            $sel_hora = $datos['sel_hora'];  
            $sem = $datos['sem'];
          
$this->db->ejecutar("INSERT INTO turno(ID_HORARIO,SEM_TURNO,CUPMAX_TURNO,FCH_TURNO)VALUES(".$sel_hora.",".$sem.",".$cant.",'".$fecha_turno."')"); 
       }
       
       function eliminarHora($datos)
       {
           $valorId = $datos['valorId'];                      
           $this->db->ejecutar("DELETE FROM turnoempaques WHERE IDTURNOEM = ".$valorId."");
           
       }
       
       
      
   }