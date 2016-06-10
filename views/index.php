<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">      
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ApiMP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>   
</div>
 <section>
   <div class="container">
      <div class="jumbotron">
        <h3>API</h3> 
        <button id="mostrar" class="btn btn-primary btn-lg">Mostrar</button>   
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">
     <div class="row">
       <div class="col-sm-6" id="ocho"></div>       
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
  var uri = "http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?Publicadas&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A";
$("#mostrar").click(function(){
$.getJSON(uri)
  .done(function( data ) {

        console.log(data.Cantidad); 
        console.log(data.FechaCreacion); 
        console.log(data.Version); 

          /*console.log(data.Cantidad); */
 $.each(data.Listado, function(i, campo){
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>"
                    +campo.Nombre+ "</h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");          
                                     
        });
      });
       
    
    
  });
  
  
</script>
</body>
</html>