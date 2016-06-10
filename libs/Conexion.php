<?php

# Clase creada por Jorge Silva Borda
class Conexion{
    # propiedades que solo puede usar la clase Conexion
    private $servidor, $baseDato, $usuario, $password;
    public $my;
    # Metodo Conexion que recibe 4 parametros 
    function Conexion($servidor, $baseDato, $usuario, $password)
    {
        # se guardan los datos de los parametros en las propiedades de la clase
        $this->servidor = $servidor;
        $this->baseDato = $baseDato;
        $this->usuario = $usuario;
        $this->password = $password;
        # se llama al metodo privado configurar()
        $this->configurar();
    }
    # Metodo privado configurar()
    private function configurar()
    {
        # se instancia un objeto de la clase de php mysqli con los parametros de las propiedades
        $this->my = new mysqli($this->servidor, $this->usuario, $this->password, $this->baseDato);
    }
       # metodo publico ejecutar, que recibe como parametro la consulta a la base de datos
    public function ejecutar($query)
    {
        # se le asigna a la variable result la consulta 
        $result = $this->my->query($query);
        # con return se devuelve el resultado de la variable
        return $result;
    }
    
     
    
    
    
}
