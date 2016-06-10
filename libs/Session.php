<?php

class session    
{    
    # metodo estatico para avilitar las sesiones
    static function init()
    {   
        # funcion para habilitar las variables de sesion
        session_start();                
    }
    # metodo estatico para eliminar las sesiones activas del sistema
    static function destroy()
    {
        # funcion para destruir las variables de sesion activas
        session_destroy();
    }
    # metodo estatico con un parametro para obtener el valor de la sesion
    static function getValue($var)
    {
        # Retorna el valor de la sesion
        return $_SESSION[$var];
        
    }
    # metodo estatico con 2 parametros para crear una sesion
    static function setValue($var,$val)
    {   
        # Se le da el nombre con $var y el valor de la sesion con $val
        $_SESSION[$var] = $val;
        
    }
    # metodo estatico con un parametro para eliminar la sesion
    static function unsetValue($var)
    {
        # si el parametro del metodo coincide con el nombre de la sesion
        if($_SESSION[$var])
        {
            # la funcion de php unset() vacia el contenido de esa sesion
            unset($_SESSION[$var]);
        }
        
    }
    # metodo estatico para saber si existe una sesion
    static function exist(){
        # funcion de php sizeof() para saber el tamaño de la sesion
        # si la sesion es mayor a 0
        if(sizeof($_SESSION) > 0)
        {
        # al ser verdadero retorna un valor boleano true    
        return true;
            
        }else
        {
        # al ser falso retorna el boleano false    
            return false;
        }
            
        
        
    }   
}

?>