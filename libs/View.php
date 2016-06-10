<?php

  class view
  {      
    # metodo render() que acepta un parametro  
    function render($view)
    {      
        # inclusion require para mostrar la pagina que se especifique en el parametro
        require './views/'.$view.'.php';
    }                            
  }







?>