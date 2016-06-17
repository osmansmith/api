<?php
$estado = "Adjudicada";
if(isset($_POST['cambio']) && $_POST['cambio'] != " "){
    $estado = $_POST['cambio'];
}
$response = file_get_contents(JSON.'estado='.$estado.'&ticket='.TIC);
/*print $response;*/
$response = json_decode($response);
$cantidad = (string)$response->Cantidad;
$version = (string)$response->Version;
$fecha = (string)$response->FechaCreacion;
$count = count($response->Listado);
echo $count;
/*echo gettype((object)$response->FechaCreacion);*/
for($i=0;$i<$count;$i++){    
    foreach ($response->Listado[$i] as $key => $value) {

           echo $key." = ".$value."<br />";             
    }
}
/*foreach ($response as $key => $value) {
    
    echo "Cantidad : ".$value[Cantidad]. "<br />"; 
    foreach((array)$value[] as $key2 => $value2){
        
    }
    
}*/

?>
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
               <button class="btn btn-success btn-lg" id="Todos">Todos</button>
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
       <div class="col-sm-12" id="ocho">      
       </div>
             
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
 $("#Todos").click(function(){
    $.post('<?php echo URL;?>index/otro/<?php echo "Todos";?>',{'cambio':"Todos"}); 
 });    
</script>
</body>
</html>