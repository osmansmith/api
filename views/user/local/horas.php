 <h4 style="margin-bottom:5%;" class="ui horizontal divider header">Registrar Horario predeterminado</h4>
 <form class="ui form">
<div class="three fields"> 
<div class="field"><label for="">Hora Inicio :</label>
<input type="time" name="horain" id="horain" placeholder="Ingrese hora inicio" required>
</div>
<div class="field"><label for="">Hora Termino :</label>
<input type="time" name="horaout" id="horaout" placeholder="Ingrese hora inicio" required>
</div>
<div class="field">
   <button style="margin-top:9%;" id="btn_hora" class="blue ui button">Fijar hora</button>  
    </div>
   </div>
</form>
 <h4 style="margin-bottom:5%;margin-top:5%;" class="ui horizontal divider header">Horarios Disponibles</h4>
    <div class="ui middle aligned divided list">     
   <?php    
     $con = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
     $result = $con->ejecutar("SELECT * FROM horario");
        if($result)
        {
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC))
     {
          $inicio = $fila['IN_HORARIO']; 
         $final = $fila['OUT_HORARIO'];    
         print '
  <div class="item">
    <div class="right floated content">
      <div class="ui button">Editar</div>
    </div>    
    <div class="content">
      Inicio : '.date("H:i", strtotime($inicio)).' Termino : '.date("H:i", strtotime($final)).' 
    </div>
  </div>
       ';             
     }
        }
    ?> 
        </div> 
<script>

$("#btn_hora").click(function(e){
    e.preventDefault();
    
    var horain = $("#horain").val();
    var horaout = $("#horaout").val();
    var hora = {
        'horain' : horain,
        'horaout' : horaout
               }
    if(horain != "" && horaout != "")
        {
    $.post('<?php echo URL;?>registro/registro_horas',hora,function(data){ alert('horario creado') });
        }else{
            alert("porfavor rellene todos los campos");
        }
    
    
    
});         

</script>