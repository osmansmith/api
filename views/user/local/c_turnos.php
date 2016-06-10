<script src="<?php echo URL; ?>public/dist/jquery-1.11.3.min.js"></script>
<script src="<?php echo URL; ?>public/dist/semantic.min.js"></script>
<script src="<?php echo URL;?>public/js/daterangepicker.js"></script>     
<script src="<?php echo URL;?>public/js/moment.js"></script>  
<script src="<?php echo URL;?>public/js/moment-with-locales.js"></script>   
  <h4 class="ui horizontal divider header" >Registrar Turno</h4>

 
<form class="ui form">
<div class="four fields"> 
<div class="field">
       <label for="fecha"> Fecha de turno :</label>
       <input type="text" name="fecha_turno" id="fecha_turno" placeholder="ej 2016/12/01">         
</div>
<div class="field"> <label for="">Cantidad de cupos :</label><input type="number" name="cant" id="cant" placeholder="Registrar cantidad"></div>
<div class="field"><label for="">Nº de Semana :</label> <input type="number" name="sem" id="sem" placeholder="Indique nº de semana"></div>
<div class="field">
<label for="">Horario :</label><select name="sel_hora" id="sel_hora" class="ui dropdown">
   <option value="" selected> Seleccione Horario </option>
    <?php
     $con = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
     $result = $con->ejecutar("SELECT * FROM horario");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $inicio = $fila['IN_HORARIO']; 
         $final = $fila['OUT_HORARIO'];    
         print "
         <option value='".$fila["ID_HORARIO"]."'>inicio : ".date("H:i", strtotime($inicio))." Termino : ".date("H:i", strtotime($final))." </option>";             
        }        
    ?>
</select>
    </div>
  </div>   
<div class="inline field"><button id="btn_guardar_turno" class="blue ui button">Guardar Turno</button></div>
</form>
 
<h4 class="ui horizontal divider header" >Turnos disponibles</h4>
 <!-- Vista de elementos de los turnos-->
   
   <div class="ui grid">
      <?php
       $fecha = 0;
$re = $con->ejecutar("SELECT DISTINCT FCH_TURNO FROM turno");
  while($fila = mysqli_fetch_array($re, MYSQLI_ASSOC))
  { 
      print ' <script>
      $("#detalle'.$fila['FCH_TURNO'].'").click(function(){$(".ui.modal.detalle'.$fila['FCH_TURNO'].'").modal("show"); });</script>';
      $fecha += 1;
      $fila['FCH_TURNO']; };
       $result = $con->ejecutar("SELECT DISTINCT SEM_TURNO FROM turno");
        while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $cont = $fila['SEM_TURNO'];
            print '
            <script> $("#semana'.$fila['SEM_TURNO'].'").click(function(e){ e.preventDefault; $(".ui.modal.semana'.$fila['SEM_TURNO'].'").modal("show") });</script>  
            <div class="two wide column"><button class="ui button green" id="semana'.$fila['SEM_TURNO'].'">Semana '.$fila['SEM_TURNO'].'</button></div>';
        }                    
       ?>                    
   </div>      
   <?php

     for($i=1;$i<$cont+1;$i++)
     {
         
         print '  <div class="ui modal semana'.$i.'">
                 <i class="close icon"></i>
                  <div class="header">Turnos Semana Nº'.$i.'</div>
                  <div class="image content">
                   ';  
         $res = $con->ejecutar("SELECT DISTINCT FCH_TURNO,SEM_TURNO FROM turno WHERE SEM_TURNO = ".$i."");
         while($fila = mysqli_fetch_array($res, MYSQLI_ASSOC))
         {
         print '
        <p>Fecha : <strong id="dat'.$fila['FCH_TURNO'].'"></strong>    <button class="ui button grey" id="detalle'.$fila['SEM_TURNO'].'">Detalle</button></p>
        <script>
        var fecha = moment("'.$fila['FCH_TURNO'].'", "YYYY MM DD", "es");       
        $("#dat'.$fila['FCH_TURNO'].'").html(fecha.format("dddd DD MMMM"));         
        </script>
        ';
         };                           
         print'
                </div>
                </div>';             
         }



     for($j=1;$j<$fecha+1;$j++)
     {
          print '  <div class="ui modal detalle'.$j.'">
                 <i class="close icon"></i>
                  <div class="header">Detalle </div>
                  <div class="image content">
                   </div>
                </div>'; 
      
         
     }

?> 
   
    
<script>
$('#fecha_turno').hover(function(){$('#fecha_turno').daterangepicker({ singleDatePicker: true,format: 'YYYY/MM/DD'},''); return false; },1000);
$('#btn_guardar_turno').click(function(e){
    e.preventDefault();
    var fecha_turno = $('#fecha_turno').val();
    var cant = $('#cant').val();
    var sel_hora = $('#sel_hora').val();
    var sem = $('#sem').val();
    var datos_turno = {
        
          'fecha_turno' : fecha_turno,
          'cant' : cant,
          'sel_hora' : sel_hora,
          'sem' : sem        
        }      
    if(fecha_turno != "" && cant != "" && sel_hora != "" && sem != "")
        {
            $.post('<?php echo URL;?>registro/registro_turno',datos_turno,function(datos){ alert('Datos guardados satisfactoriamente c: ');});
        }else{
            alert('Complete todos los campos');
        }
});

$('#img').click(function(e){$('.ui.modal.imagen').modal('show'); e.preventDefault();});  

</script>  

        
