<?php
session_start();

include("../recursos/funciones.php");
$var=conectar();

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>:: Pangea Technologies ::</title>
    <meta charset="utf-8">
     <link href="../recursos/css/bootstrap.css" rel="stylesheet">
     <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
     <link href="../recursos/css/bootstrap-responsive.css" rel="stylesheet">
     <link href="../recursos/css/bootstrap-responsive.min.css" rel="stylesheet">
     <link href="../recursos/css/estiloadmin.css" rel="stylesheet">
    
   </head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">

<div class="container">
    <div class="navbar">
    	<div class="navbar-inner">
      		<div class="container" style="width: auto;">
        		<a class="btn btn-navbar" data-toggle="collapse" data-target="#barrap">
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
        		</a>
        		<a  class="brand" id="brand-admin" href="#">PANGEATECH</a>
        	<div id="barrap" class="nav-collapse">
          		<ul class="nav">
            		<li><a href="#servicios">SERVICIOS</a></li>
            		<li><a href="#productos">PRODUCTOS</a></li>
            		<li><a href="#tecnologia">TECNOLOGÍA</a></li>
           			<li><a href="#nosotros">NOSOTROS</a></li>
           			<li><a href="#contacto">CONTACTO</a></li>
         		</ul>
      
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>

</div><!-- /container -->



<!-- Le javascript
================================================== -->
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script>
<script src="../recursos/js/bootstrap.js"></script>
<script src="../recursos/js/bootstrap.min.js"></script>

</body>
</html>
