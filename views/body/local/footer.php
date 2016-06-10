</div>
</div>
</body>
<!--<script src="<?php echo URL; ?>public/dist/jquery-1.11.3.min.js"></script>-->
<script src="<?php echo URL; ?>public/dist/jquery-1.11.3.min.js"></script>
<script src="<?php echo URL; ?>public/dist/semantic.min.js"></script>
<script src="<?php echo URL;?>public/js/daterangepicker.js"></script>     
<script src="<?php echo URL;?>public/js/moment.js"></script>  
<script src="<?php echo URL;?>public/js/moment-with-locales.js"></script>    
<script>

$('.ui.accordion').accordion();  
$('.ui.dropdown').dropdown(); 
$('.ui.checkbox').checkbox();
//$('.ui.dropdown').dropdown({on: 'click'});

$("#horas").click(function(){ $.post("<?php echo URL;?>local/horas",function(data){ $("#contenido").html(data)});}); 
$("#c_turnos").click(function(){ $.post("<?php echo URL;?>local/c_turnos",function(data){ $("#contenido").html(data)});}); 
$("#c_fechas").click(function(){ $.post("<?php echo URL;?>local/c_fechas",function(data){ $("#contenido").html(data)});}); 
$("#usuario").click(function(){
$.post("<?php echo URL;?>local/usuario",function(data){ $("#contenido").html(data)});
});   
$("#mensaje").click(function(){ $.post("<?php echo URL;?>local/mensaje",function(data){ $("#contenido").html(data)});}); 
$.post("<?php echo URL;?>local/horas",function(data){ $("#contenido").html(data)});   
     var url = "<?php echo URL;?>";   
     $('#btn').click(function(){   
    var fd = new FormData();    
    fd.append( 'img', $('#photo')[0].files[0]);                     
    $.ajax( {
      url: url+'registro/registro_img',
      type: 'POST',
      data: fd,
      processData: false,
      contentType: false,
      success: function(res){
          if(res == "no"){
          alert("El archivo no es compatible");
              $('#photo').val("");              
          }else{
          alert("Actualización Completa");
           $('#photomodal').attr("src", res);
           $('#photouser').attr("src",res);
           $('#photo').val("");
           return false;
       }
      }
    });
   });
   $('#img').click(function(e){$('.ui.modal.imagen').modal('show'); e.preventDefault();});     
   

$('#btn_horario').click(function()
{    
     var fech = $('#selfecha').val();  
     var cant = $('#cant').val();
     var horain = $('#horain').val();
     var horaout = $('#horaout').val();
     var registro = {
         'fech' : fech,
         'cant' : cant,
         'horain' : horain,
         'horaout' : horaout
     };
    
     $.post('<?php echo URL;?>registro/registro_horario',registro,function(dat){alert('datos enviados');});
 });  
$('#selturnos').change(function()
{
    var valor = $( this ).val();
    var valores = {
        'aidi' : valor
    };
    if(valor == "")
        {    
        }else{
     $.post("<?php echo URL;?>local/verTurnos",valores,function(data){ $("#turnos").html(data)});      
        }
});

   
 /* var fechaEs = moment('2016-02-23', "YYYY MM DD", "es");
 console.log("Fecha con localización :"+ fechaEs.format("dddd DD MMMM YYYY"));*/               
</script>
</html>