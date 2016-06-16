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
        <li><a href="<?php echo URL;?>index/otro">Api por php</a></li>
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
          <h4>ELige la lista que quieres ver</h4>    
          <div class="row">
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Publicada">Publicada</button></div>
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Cerrada">Cerrada</button></div>
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Desierta">Desierta</button></div>
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Adjudicada">Adjudicada</button></div>
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Revocada">Revocada</button></div>
              <div class="col-sm-2"><button class="btn btn-success btn-lg " id="Suspendida">Suspendida</button></div>
          </div>
          <br />
       <div class="row">
           <div class="col-sm-4">
               <button class="btn btn-success btn-lg" id="Todos">Todos</button><button class="btn btn-success btn-lg" id="guardar_">Guardar</button>
           </div>
       </div>
       <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                 <p id="est"></p><br>
                <p id="cant"></p> 
                </div>
            </div>
       </div>
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">
    
     <div class="row"> 
      <form action="<?php echo URL;?>index/guardar" method="post">  
       <div class="col-sm-12" id="ocho">
       <!-- <div class="gifLoad">
          <img src="<?php echo URL;?>public/img/loading.gif">
        </div>-->
         
       </div>
       </form>          
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
  $("#enviar").hide();
  var datos = {};
  var nombre = new Array();
  var externo = new Array();
  var cierre = new Array();
  var estado = new Array();
  var cont = 0;
  /*var uri = "<?php echo JSON;?>estado=activas&ticket=<?php echo TIC;?>"; */
$("#Todos").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }  
    var uri = "<?php echo JSON;?>estado=Todos&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {              
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Todos');
     $.each(data.Listado, function(i, campo){    
       $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
            });
          });             
});
$("#Cerrada").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }  
    var uri = "<?php echo JSON;?>estado=Cerrada&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {  
         $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Cerrada');
     $.each(data.Listado, function(i, campo){    
       $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
            });
          });             
});
$("#Desierta").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Desierta&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
            $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Desierta');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Adjudicada").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Adjudicada&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Adjudicada');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Revocada").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Revocada&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Revocada');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /></div></div></form>");                                  
        });
      });             
});
$("#Suspendida").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Suspendida&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Suspendida');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Publicada").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }    
    var uri = "<?php echo JSON;?>estado=Publicada&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Publicada');
     $.each(data.Listado, function(i, campo){    
       $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");          
                         nombre[i] = campo.Nombre;
                        externo[i] = campo.CodigoExterno;
                         cierre[i] = campo.FechaCierre;
                         estado[i] = campo.CodigoEstado;            

                   datos = {
                    'nombre' : nombre[i],
                    'externo' : externo[i],
                    'cierre' : cierre[i],
                    'estado' : estado[i]
                  };



            });
          }); 

        /*$.ajax({
          type: 'GET',
           url : 'http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?estado=activas&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A',
          dataType: 'json',     
          success: function(data){

              $.each(data.Listado, function(i, campo){    
              $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");        
                        nombre[i] = campo.Nombre;
                        externo[i] = campo.CodigoExterno;
                         cierre[i] = campo.FechaCierre;
                         estado[i] = campo.CodigoEstado;
                console.log(typeof nombre[i]+"<br />"+
                            typeof externo[i]+"<br />"+
                            typeof cierre[i]+"<br />"+
                            typeof estado[i]+"<br />"
                           )



                cont += 1;
                   datos = {
                    'nombre' : nombre[i],
                    'externo' : externo[i],
                    'cierre' : cierre[i],
                    'estado' : estado[i]
                  };
                console.log(datos);
            });


        }
      });
       */       
});
    $("#guardar_").click(function(){
        $("form").submit();
    });

  
 
  
</script>
</body>
</html>