<?php  
  class index extends Controller
  {
      # la funcion constructora hereda de controller
      function __construct()
      {
          parent::__construct();
      }            
      # metodo index
      function index()
      {
          # el metodo render admite un parametro que es la pagina de la carpeta views sin el .php
          $this->view->render('index');
      }       
      function inicio()
      {           
         
          $this->view->render('inicio');
   
      }
      function otro($algo)
      {
        $this->view->render('por_php');   
      }
      function guardar(){
           $this->view->render('datos');
      }
      public function licitacion()
      {    
          # Array Asociativo
          $datos = [   
              'nombre' => $_POST['nombre'],
              'externo' => $_POST['externo'],
              'cierre' => $_POST['cierre'],
              'estado' => $_POST['estado']
              
          ];                                             
              $this->model->registrar($datos);                                      
      }    
     
      
      
  }
?>