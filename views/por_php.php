<?php
$mensaje=" ";
$estado = "Adjudicada";
if(isset($_POST['cambio'])){    
    $estado = $_POST['cambio'];
}
/*$fecha_api = date('d/m/Y');*/
$fecha_api = '17/06/2016';
/*Por Fecha es ddmmaaaa  desde 09/01/2006 */
$fechaArray = explode('/',$fecha_api);
$fechaFinal = $fechaArray[0].$fechaArray[1].$fechaArray[2];         
$response = file_get_contents(JSON.'fecha='.$fechaFinal.'&estado='.$estado.'&ticket='.TIC);
/*print $response;*/
$response = json_decode($response);
$cantidad = (string)$response->Cantidad;
$version = (string)$response->Version;
$fecha = (string)$response->FechaCreacion;
$count = count($response->Listado);
/*echo gettype((object)$response->FechaCreacion);*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Api con php</title>    
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
        <li><a href="<?php echo URL;?>index/index">Api por javascript</a></li>
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
        <li><a href="#">Salir</a></li>
       
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
          <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Publicada" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Publicada">Publicada</button></div>
          </form>
          <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Cerrada" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Cerrada">Cerrada</button></div>
           </form>
           <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Desierta" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Desierta">Desierta</button></div>
           </form>
            <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Adjudicada" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Adjudicada">Adjudicada</button></div>
            </form>
           <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Revocada" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Revocada">Revocada</button></div>
           </form>
           <form action="<?php echo URL;?>index/otro" method="post">
           <input type="text" value="Suspendida" name="cambio" hidden>
          <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg " id="Suspendida">Suspendida</button></div>
              </form>
                                
          </div>
          <br />
       <div class="row">
           <div class="col-sm-4">
              <form method="post" action="<?php echo URL;?>index/otro">
               <input type="text" name="cambio" value="Todos" hidden>
               <input type="submit" class="btn btn-success btn-lg"  value="Todos" />
               </form>
           </div>
       </div>
       <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                 <p class="lead"><b>Cantidad :</b><em><?php echo $cantidad;?></em> </p>
                <p class="lead"><b>Estado : </b><em><?php echo $estado;?></em></p> 
                <p class="lead"><b>Fecha : </b><em><?php echo $fecha_api;?></em></p> 
                
                </div>
            </div>
       </div>
       <div class="row">
           <div class="col-sm-10">
               <?php echo $mensaje;?>
           </div>
       </div>
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">    
     <div class="row">      
       <div class="col-sm-12" id="ocho"> 
       <?php  
          $co = new Conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
           for($i=0;$i<$count;$i++){ 
           $nom = (string)$response->Listado[$i]->Nombre;
           $cod = (string)$response->Listado[$i]->CodigoExterno;
           $fec = (string)$response->Listado[$i]->FechaCierre;
           print ' <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">'.$nom.'</h3>
                      </div>
                      <div class="panel-body">
                           <p class="lead"> Codigo de Licitación :'.$cod.'</p>
                           <p class="lead"> Fecha de Cierre :'.$fec.'</p>
                      </div>
                    </div>';
                 $result = $co->ejecutar("SELECT codigo_base FROM base WHERE codigo_base ='".$cod."'");
               if($result)
               {
                  /* si se encuentra codigo significa que esta guardado*/
               }else{
                $co->ejecutar("INSERT INTO base(codigo_base,nombre_base,fecha_base)VALUES('".$cod."','".$nom."','".$fec."')");
                 $mensaje = '<div class="alert alert-success" role="alert">Datos guardados <em>Exitosamente!</em></div>';
               }
               
                }
           
              
             
          
           ?>     
       </div>
             
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
</body>
</html>