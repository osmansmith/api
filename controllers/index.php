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
      function encargadoempaque()
      {
           # el metodo render admite un parametro que es la pagina de la carpeta views sin el .php
          $this->view->render('user/encargado');
      }
      function piocha()
      {         
          $this->view->render('body/empaque/head');
          $this->view->render('user/piocha');
          $this->view->render('body/empaque/footer');
      }           
      function empaque()
     {   
         $this->view->render('body/empaque/head');
         $this->view->render('user/empaque'); 
         $this->view->render('body/empaque/footer');
      } 
      
      
      function data()
      {
          header("location:".URL."sse/sse.php");
      }
      
      
  }
?>