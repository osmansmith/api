

<!DOCTYPE html>
<html lang="en">
<head>   
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
 <title> <?php echo ucwords(session::getValue('nom'));?> <?php echo ucwords(session::getValue('ap'));?></title>
<link rel="Stylesheet" href="<?php print URL; ?>public/dist/semantic.min.css"/>
<link rel="stylesheet" href="<?php echo URL;?>public/css/daterangepicker.css"/>
</head>
<body>

<div class="ui modal imagen">
 <i class="close icon"></i>
  <div class="header">Cambiar foto de Perfil</div>
  <div class="image content">
     <div class="ui form">
     <div class="ui two column middle aligned very relaxed grid">
        <div class="column">
             <div class="item">
              <a class="ui image">
               <img id="photomodal" src="<?php echo URL;?><?php echo session::getValue('img');?>">
              </a>
             </div>            
        </div>
        
        <div class="center aligned column">
         <p><h1>Seleccione la imagen a subir</h1></p>
         <form id="form">
         <div class="ui form" >
          <input type="file" id="photo" name="photo">        
         </div>
         <br />
         <div class="ui form actions">
          <div  class="ui button" id="btn">Guardar</div>
          <div class="ui cancel button">Cancelar</div>
         </div> 
         </form>
        </div>
     </div>
    </div>            
</div>
</div> 

<div class="ui container">
     <div class="ui stackable two column grid">    
      <div style=" min-height: 70px; padding-top:2%;" class="twelve wide column">
      <div class="ui items">
      <div class="item">
        <a class="ui tiny image" id="img">
          <img id="photouser" src="<?php echo URL;?><?php echo session::getValue('img');?>">
        </a>
        <div class="content">
          <a class="header"><?php echo ucwords(session::getValue('nom'));?> <?php echo ucwords(session::getValue('ap'));?></a>
          <div class="description">
            <p>Ultima conexión :<small> <?php echo strftime( "%Y/%m/%d", time() );;?></small></p>
          </div>
        </div>
      </div>
        </div>
             </div>                                  
      <div style=" min-height: 70px; padding:4% 0 0 4%;" class="four wide column">
             <div class="ui dropdown">
      <i class="sidebar icon"></i>
      <span class="text">Configuracion de perfil</span>
      <div class="menu">
        <div class="ui icon search input">
          <i class="search icon"></i>
          <input type="text" placeholder="Search tags...">
        </div>
        <div class="divider"></div>
        <div class="header">
          <i class="tags icon"></i>
          Tag Label
        </div>
        <div class="scrolling menu">      
         <a class="item" href="<?php echo URL;?>User/matar"> 

            <div class="ui red empty circular label"></div>
            Cerrar sesion

          </a>
        </div>
      </div>
    </div>    
     </div>         
     </div>
         
    <div class="ui stackable two column grid">  
  <div id="capa1" style=" min-height: 450px;" class="four wide column">  
<div class="ui styled fluid accordion">
  <div class="title">
    <i class="dropdown icon"></i>
    Registrar
  </div>
  <div class="content">
    <p class="transition hidden">
   <div class="ui vertical text menu">  
  <a id="usuario" class="item active">
    Registrar Usuarios
  </a> 
   <a class="item">
   Editar Usuarios
  </a>
   <a class="item">
   Eliminar Usuarios
  </a>  
</div>
 </p>
  </div>
  <div class="title">
    <i class="dropdown icon"></i>
    Turnos
  </div>
  <div class="content">
    <p class="transition hidden"><div class="ui vertical text menu">  
  <a id="horas" class="item active">
    Crear Horario Pre.
  </a>  
  <a id="c_turnos" class="item">
    Crear Turnos
  </a>
  <a class="item">
    Eliminar turnos
  </a>
</div>
 </p>
  </div>
  <div class="title">
    <i class="dropdown icon"></i>
    Mensaje y Faltas
  </div>
  <div class="content">
    <p class="transition hidden"><div class="ui vertical text menu">  
  <a id="mensaje" class="item active">
    Registrar Mensaje
  </a>
  <a class="item">
    ver Faltas
  </a>
  <a class="item">
    Editar Faltas
  </a>
</div>
 </p>
  </div>
</div>            
</div> 