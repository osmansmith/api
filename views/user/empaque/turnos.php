<hr>  
<h1 style="text-align:center;">Toma de Turnos Online</h1>   
<hr>
<button id="toma_turnos">turnos</button>
<div id="contenido">

</div> 
<script>
   $("#toma_turnos").click(function(){$.post('<?php echo URL;?>empaque/toma_turnos','',function(data){ $('#contenido').html(data)}); }); 
</script>