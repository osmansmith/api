<?php

  class model{                 
      # la funcion constructora instancia un objeto de la clase Conexion 
      function __construct()
      { 
          # en el metodo Conexion se le pasan como parametros las constantes del archivo de configuracion
          $this->db = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
      }            
  } 
?>