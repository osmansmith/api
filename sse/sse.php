<?php

 date_default_timezone_set('Chile/Continental');
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache'); 

        function sendMsg($msg) 
        {
          echo "retry: 1000"; 
          echo PHP_EOL;
          echo "data: $msg\n" . PHP_EOL;
          ob_flush();
          flush();
           
        }
        //$ar["hora"] =  "enviado a las ".date("h:i:s", time()) ;      
        //$res = $ar["hora"];
         if(isset($_POST['cambio']))
         {
            $ar['retorno'] = 2; 
         }
        $ar['retorno'] = 1;
        $result   = json_encode($ar);
        sendMsg($result);
       
            ?>