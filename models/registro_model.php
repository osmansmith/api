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
        $nombre = $dato['nombre'];   
        $cierre = $dato['cierre'];
        $externo = $dato['externo'];
        $estado = $dato['estado'];
        
  $this->db->ejecutar("SELECT * FROM licitacion WHERE nombre_lic = '".$nombre."' AND externo_lic = '".$externo."' AND cierre_lic = '".$cierre."' AND estado_lic = '".$estado."'");
         if($this->db){
           
         }else{
        $this->db->ejecutar("INSERT INTO licitacion(nombre_lic,externo_lic,cierre_lic,estado_lic) VALUES('".$nombre."','".$externo."','".$cierre."',".$estado_lic.")");           
                                      
         }
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