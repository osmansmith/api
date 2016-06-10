if (window.EventSource !== undefined) {
 var source = new EventSource('<?php echo URL;?>sse/sse.php'); 
  }else{}    
source.addEventListener('message', function(e) 
{ 
   var json = eval("(" + e.data + ")");
       retorno = json.retorno; 
    //  hora = json.hora;
      //x = json.elegir;
       //console.log(e.data);
  // var mensaje = retorno;                        
  // var result = document.getElementById("contenido").innerHTML;
    // document.getElementById("contenido").innerHTML+=retorno;   
   
}, false);
source.addEventListener('error', function(e) {
  if (e.readyState == EventSource.CLOSED) {
    // Connection was closed.
  }
}, false);
/* $("#stop").click(function(){
      source.close(); 
   });  */ 	