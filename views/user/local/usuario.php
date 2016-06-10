      <h4 class="ui horizontal divider header">Registrar Usuario</h4>
    
  <form id="form-em" class="ui form">
  <div class="two fields">  
  <div class="field"><input type="text" id="nom" placeholder="Ingrese Nombre"></div>
  <div class="field"><input type="text" id="app" placeholder="Ingrese A.Paterno"></div>
      </div>
      <div class="two fields">
  <div class="field"><input type="text" id="apm" placeholder="Ingrese A.Materno"></div>
  <div class="field"><input type="number" id="fono" placeholder="Ingrese Nº Movil"></div>
      </div>
      <div class="two fields">
  <div class="field"><input type="text" id="dir" placeholder="Ingrese Dirección"></div>
  <div class="field"><input type="email" id="ema" placeholder="Ingrese Correo"></div>
      </div>
      <div class="two fields">
  <div class="field"><input type="password" id="pass" placeholder="Ingrese Contraseña"></div>
  <div class="field">
  <select name="used" id="used" required>
  <option value="emp_pioch"selected>Empaque</option>
  <option value="emp_pioch">Piocha</option>
  <option value="eemp">Encargado</option>
  </select></div>
      </div>
  <div class="inline field"><button id="btn_en" class="blue ui button">Guardar</button></div>
</form> 
<h4 class="ui horizontal divider header">Usuarios</h4>
<button id="emp" class="blue ui button">Empaques</button>
<button id="pio" class="blue ui button">Piochas</button>
<button id="enc" class="blue ui button">Encargados</button>

<div class="ui modal empaque">
  <i class="close icon"></i>
  <div class="header">
  Lista de Empaques
  </div>
  <div class="image content">   
    <div class="description">
           <div class="ui middle aligned divided list">
            <?php
     $co = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
     $result = $co->ejecutar("SELECT * FROM users WHERE ID_USER = ALL (SELECT ID_USER FROM emp_pioch WHERE TIPO_EP = 0 )");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print '
  <div class="item">    
    <img class="ui avatar image" src="'.URL.''.$fila['IMG_USER'].'">
    <div class="content">
      '.ucwords($fila['NOM_USER']).' '.ucwords($fila['AP_USER']).' '.ucwords($fila['AM_USER']).' | '.$fila['CORREO_USER'].' |  '.$fila['PASS_USER'].'
    </div>
  </div>
       ';             
        }        
    ?>                                           
        </div> 
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancel</div>  
  </div>
</div>

<div class="ui modal piocha">
  <i class="close icon"></i>
  <div class="header">
  Lista de Piochas
  </div>
  <div class="image content">
   
    <div class="description">
        <div class="ui middle aligned divided list">     
   <?php    
     $result = $co->ejecutar("SELECT * FROM users WHERE ID_USER = ALL (SELECT ID_USER FROM emp_pioch WHERE TIPO_EP = 1 )");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print '
  <div class="item">
    <div class="right floated content">
      <div class="ui button">Editar</div>
    </div>
    <img class="ui avatar image" src="'.URL.''.$fila['IMG_USER'].'">
    <div class="content">
      '.ucwords($fila['NOM_USER']).' '.ucwords($fila['AP_USER']).' '.ucwords($fila['AM_USER']).' | '.$fila['CORREO_USER'].' |  '.$fila['PASS_USER'].'
    </div>
  </div>
       ';             
        }        
    ?> 
        </div>          
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancel</div>  
  </div>
</div>

<div class="ui modal encargado">
  <i class="close icon"></i>
  <div class="header">
   Lista de Encaragdos
  </div>
  <div class="image content">
   
    <div class="description">
           
        <div class="ui middle aligned divided list">     
   <?php    
     $result = $co->ejecutar("SELECT * FROM users, eemp WHERE users.ID_USER = eemp.ID_USER");
     while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         print '
  <div class="item">
    <div class="right floated content">
      <div class="ui button">Editar</div>
    </div>
    <img class="ui avatar image" src="'.URL.''.$fila['IMG_USER'].'">
    <div class="content">
      '.ucwords($fila['NOM_USER']).' '.ucwords($fila['AP_USER']).' | '.ucwords($fila['AM_USER']).' | '.$fila['CORREO_USER'].'   '.$fila['PASS_USER'].'
    </div>
  </div>
       ';             
        }        
    ?> 
        </div> 
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancel</div>  
  </div>
</div>
 <script>
$('#btn_en').click(function(e)
 {   
    e.preventDefault();
    var imagen = "public/img/jenny.jpg";
    var nombre = $('#nom').val();
    var apellidop = $('#app').val();
    var apellidom = $('#apm').val();
    var fono = $('#fono').val();
    var direccion = $('#dir').val();    
    var email = $('#ema').val();
    var pass = $('#pass').val();
    var tipo=$('#used').val();
    var formData = {
        'imagen' : imagen,
        'nombre' : nombre,
        'apellidop': apellidop,
        'apellidom': apellidom,
        'fono' : fono,
        'direccion' : direccion,
        'email' : email,
        'pass' : pass,
        'tipo' : tipo,
        'estado' : 1
    }
    
    
    if(nombre != '' || apellidop != '' || apellidom != '' || fono != '' || direccion != '' || email != '' || pass != '' )
        {      
    $.post('<?php echo URL;?>registro/registro_',formData,function(algo){
        $('#nom').val('');
        $('#app').val('');
        $('#apm').val('');
        $('#fono').val('');
        $('#dir').val('');
        $('#ema').val('');
        $('#pass').val('');
        $('#used').val('');        
        alert('datos enviados');
    });
    }else{
        alert('porfavor complete todos los campos'); 
            return false;
    }
});
                   
$('#emp').click(function(e){ e.preventDefault(); $('.ui.modal.empaque').modal('show');});
$('#pio').click(function(e){ e.preventDefault(); $('.ui.modal.piocha').modal('show');});
$('#enc').click(function(e){ e.preventDefault(); $('.ui.modal.encargado').modal('show');});    
</script>
