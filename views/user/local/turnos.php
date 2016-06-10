 <h4 class="ui horizontal divider header" >Registrar Horario</h4>

 
<form class="ui form">
<div class="two fields"> 
<div class="field"><label for="">fecha</label><select name="selfecha" id="selfecha" class="ui dropdown">
   <option value="" selected> Seleccione una Fecha </option>
    <?php
     $con = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
     $result = $con->ejecutar("SELECT * FROM turnoempaques");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print "<script>
      var fecha = moment('".$fila['FECHATURNOEM']."', 'YYYY MM DD', 'es');       
        $('#dat".$fila['FECHATURNOEM']."').text(fecha.format('dddd DD MMMM YYYY'));        
        </script>
         <option id='dat".$fila['FECHATURNOEM']."' value='".$fila["IDTURNOEM"]."'></option>";             
        }        
    ?>
</select></div>
<div class="field">
   <button style="margin-top:6%;" id="btn_crear_fecha" class="blue ui button">Crear Fecha</button>  
    </div>
   </div>
<div class="three fields">
 <div class="field"> <label for="">cantidad</label><input type="text" name="cant" id="cant" placeholder="Registrar cantidad"></div>
<div class="field"><label for="">hora inicio:</label><input type="time" name="horain" id="horain" placeholder="Registrar hora inicio"></div>
<div class=" field"><label for="">hora termino:</label><input type="time" name="horaout" id="horaout" placeholder="Registrar hora termino"></div>
    </div>
<div class="inline field"><button id="btn_horario" class="blue ui button">Guardar horario</button></div>
</form>
 
<h4 class="ui horizontal divider header" >Ver Horario</h4>
 <!-- Vista de elementos de los turnos-->
 <select name="selturnos" id="selturnos" class="ui dropdown">
 <option value=""> Seleccione una fecha</option>
 <?php
     
      $result = $con->ejecutar("SELECT * FROM turnoempaques");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print '<script>
      var fechaEs = moment("'.$fila['FECHATURNOEM'].'", "YYYY MM DD", "es");
       
        $("#dt'.$fila['FECHATURNOEM'].'").text(fechaEs.format("dddd DD MMMM YYYY")); 
       
        </script>   
         <div class="ui relaxed divided list">
  <div class="item">
    <i class="calendar middle aligned icon"></i>
    <div  class="content">
            <option id="dt'.$fila['FECHATURNOEM'].'" value="'.$fila['IDTURNOEM'].'">        
      </option>     
    </div>
  </div>
 </div>';             
        }           
     ?>
  </select> 
  
 <button id="eliminar" class="red ui button">Eliminar Fecha</button> 
 
<div id="turnos"></div>    
<div class="ui modal crear">
  <i class="close icon"></i>
  <div class="header">
   Guardar Fecha
  </div>
  <div class="image content">
   
    <div class="description">
           
          <form class="ui form"> 
<div class="two fields">
<div class="field"><div class="ui left icon input">
<input type="text" name="birthday" id="birthday" placeholder="Registrar fecha">
<i class="calendar icon"></i></div></div>
<div class="field"><button id="btn_fecha" class="blue ui button">Guardar Fecha</button></div>    
</div>
</form>  
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancel</div>  
  </div>
</div>
<div class="ui modal eliminar">
  <i class="close icon"></i>
  <div class="header">
   Escoja la fechas a eliminar
  </div>
  <div class="image content">
   
    <div class="description">
           
          <form class="ui form"> 
     <?php
              $cont = 0;
      $result = $con->ejecutar("SELECT * FROM turnoempaques");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print '<script>
      var fechaEs = moment("'.$fila['FECHATURNOEM'].'", "YYYY MM DD", "es");
       
        $("#dtu'.$fila['FECHATURNOEM'].'").text(fechaEs.format("dddd DD MMMM YYYY")); 
       
        </script> 
        <div class="inline field" >
        <div class="ui checkbox">
         <input id="ch'.$cont.'" value="'.$fila['IDTURNOEM'].'" type="checkbox" name="fechas" tabindex="0" class="hidden">
      <label id="dtu'.$fila['FECHATURNOEM'].'"></label>
      </div>
      </div>
         '
             ;
         $cont++;
     }
    ?>
         
<div class="field"><button id="btn_eliminar" class="blue ui button" onclick="btn_boton()">Eliminar fecha</button></div>    

</form>  
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancel</div>  
  </div>
</div>
<script src="<?php echo URL;?>public/js/moment.js"></script>  
<script src="<?php echo URL;?>public/js/moment-with-locales.js"></script>       
<script>
$('#birthday').hover(function(){$('#birthday').daterangepicker({ singleDatePicker: true,format: 'YYYY/MM/DD'},''); return false; },1000);
$('#btn_fecha').click(function(e)
{
     e.preventDefault();
     var fecha = $('#birthday').val();    
     var datos = {'fecha' : fecha};
     if(fecha != "")
         {
              $.post('<?php echo URL;?>registro/registro_turno',datos,'');
             $('#birthday').val("");
         }else{
             alert("porfavor escriba una fecha :( ");
         }    
 });
$('#btn_crear_fecha').click(function(e){ 
    e.preventDefault();
    $('.ui.modal.crear').modal('show'); });
</script>  

        
