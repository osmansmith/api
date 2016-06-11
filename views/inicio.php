<?php
if(!isset($_POST['code'])){
  header("location: ".URL."index/index");
}else{
$code = $_POST['code'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle</title>    
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
        <li class="active"><a href="<?php echo URL;?>index/index">Licitaciones <span class="sr-only">(current)</span></a></li>
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
        <h3>Detalle de licitacion - codigo: <?php print $code;?></h3>           
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">
     <div class="row">
       <div class="col-sm-6" id="general"></div>       
       <div class="col-sm-6" id="comprador"></div>
     </div>
     <div class="row">
       <div class="col-sm-6" id="adicional"></div>
       <div class="col-sm-6"></div>
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
  var licita = '<?php print $code;?>';
  var uri = "http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?codigo="+licita+"&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A";
var cam = Array;
$.getJSON(uri)
  .done(function( data ) {                 
 $.each(data.Listado, function(i, campo){
   $("#general").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Licitación</h3></div><div                    class='panel-body'>Nombre de Licitacion :"
                    +campo.Nombre+ "<br /> Codigo Externo :"
                    +campo.CodigoExterno+ "<br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> Descripcion :"
                    +campo.Descripcion+ "<br /> Estado :"
                    +campo.Estado);  
                   /* console.log(campo.Comprador.CodigoOrganismo); */                                                     
   $("#comprador").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Datos del Comprador</h3></div><div class='panel-body'>Nombre del Organismo Comprador : "
      +campo.Comprador.NombreOrganismo+ "<br />Codigo Organismo :"
      +campo.Comprador.CodigoOrganismo+ "<br /> Rut Unidad : "
      +campo.Comprador.RutUnidad+ "<br /> Codigo Unidad :"
      +campo.Comprador.CodigoUnidad+ "<br /> Nombre Unidad :"
      +campo.Comprador.NombreUnidad+ "<br /> Direccion Unidad :"
      +campo.Comprador.DireccionUnidad+ "<br />Comuna Unidad : "
      +campo.Comprador.ComunaUnidad+ "<br /> Region Unidad : "
      +campo.Comprador.RegionUnidad+ "<br /> Rut Usuario : "
      +campo.Comprador.RutUsuario+ "<br /> Codigo Usuario : "
      +campo.Comprador.CodigoUsuario+ "<br /> Nombre Usuario : "
      +campo.Comprador.NombreUsuario+ "<br /> Cargo Usuario : "
      +campo.Comprador.CargoUsuario); 
      $("#general").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Licitación</h3></div><div                    class='panel-body'>Nombre de Licitacion :"
                    +campo.Nombre+ "<br /> Codigo Externo :"
                    +campo.CodigoExterno+ "<br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> Descripcion :"
                    +campo.Descripcion+ "<br /> Estado :"
                    +campo.Estado); 
                          
        });
  
      });
       
    
    
 
  
  
</script>
</body>
</html>