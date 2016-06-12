
<h4 style="margin-top:3%;" class="ui horizontal divider header">Tunos por fecha</h4>

<div class="ui relaxed divided list">
<?php
   
 $idi = $_POST['aidi'];
 $con = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
     $result = $con->ejecutar("SELECT * FROM horarioempaque WHERE IDTURNOEM = ".$idi);
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         $inicio = $fila['HORAINEM']; 
         $final = $fila['HORAOUTEM'];       
         print '
  <div class="item">
  <div class="left floated content">
    <i class="calendar middle aligned icon"></i>
     Cant : '.$fila['CANTIDADEM'].'  / Inicio : '.date("H:i", strtotime($inicio)).' / Termino : '.date("H:i", strtotime($final)).'</div><div class="right floated content">
      <a><i style="color:red; font-size:25px;" class="remove circle icon"></i></a>
    </div>          
    
  </div>
';             
        }     
?>
 </div>