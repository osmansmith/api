<?php

$response = file_get_contents(JSON.'estado=Publicada&ticket='.TIC);
/*print $response;*/
$response = json_decode($response);
print_r($response->Cantidad);
echo "<br />";
print_r($response->Version);
echo "<br />";
print_r($response->FechaCreacion);
echo "<br />";
echo gettype((object)$response->FechaCreacion);
print_r($response->FechaCreacion)
/*foreach ($response as $key => $value) {
    
      
      
       
}*/

/*foreach ($response as $key => $value) {
    
    echo "Cantidad : ".$value[Cantidad]. "<br />"; 
    foreach((array)$value[] as $key2 => $value2){
        
    }
    
}*/

?>