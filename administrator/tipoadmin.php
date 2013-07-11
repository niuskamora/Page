<?php
session_start();

include("../recursos/funciones.php");
$var=conectar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>:: Pangea Technologies ::</title>
<meta name="description" content="Pagina Web"/>
<meta name="author" content="Pangea Technologies"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="utf-8">
<link href="../recursos/css/bootstrap.css" rel="stylesheet">
<link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="../recursos/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="../recursos/css/estiloadmin.css" rel="stylesheet">
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="#">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav slidernav">
            <li><a href="#servicios">Administrador</a></li>
            <li><a href="#productos">Usuario</a></li>
            <li><a href="#tecnologia">Menu</a></li>
            <li><a href="#nosotros">Informacion</a></li>
            <li><a href="#contacto">Producto</a></li>
            <li><a href="#tecnologia">Sucursal</a></li>
            <li><a href="#nosotros">Tipo Info</a></li>
            <li><a href="#contacto">Tipo Admin</a></li>
          </ul>
        </div>
        <!-- /.nav-collapse --> 
      </div>
    </div>
    <!-- /navbar-inner --> 
  </div>
</div>
<!-- /container -->
<div class="container">
   <div class="row-fluid">
                       
    <div class="span3">
      <div style="text-align:center">
        <h2> 
         
             <button class="btn btn-primary">Crear</button>
             <button class="btn btn-primary">Editar</button>
             <button class="btn btn-primary">Eliminar</button>
             <button class="btn btn-primary">Atras</button>
        
        </h2>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p> En este sitio se podran realizar todas las acciones necesarias para alimentar el contenido de la Pagina Web principal de PangeaTechnologies </p>
      </div>
    </div>
    </div>
  
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<script src="../recursos/js/bootstrap.min.js"></script>
	</body>
</html>
