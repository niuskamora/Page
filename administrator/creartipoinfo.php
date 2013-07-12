<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();
if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
	}
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
            <li><a href="admin.php">Administrador</a></li>
            <li><a href="usuario">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
            <li><a href="tipoadmin.php">Tipo Administrador</a></li>
             <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
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
        
         <div class="btn-group btn-group-vertical">
           <button class="btn btn-primary dropdown-menu btn-large text-left " onclick="location.href='../administrator/tipoinfo.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras   </button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
      <form method="post">
  <table class="table table-striped table-hover">
	      <th> Nombre </th>
	      <td> <input type="text" name="nombre" id="nombre" /></td>
      </tr>
	  <tr>
	    <th> Descripción </th>
	    <td><input type="text" name="desc" id="desc" /></td>
      </tr>
       <tr>
	    <td></td>
	    <td><button class="btn btn-primary" id="crear_uno" name="crear_uno" type="submit">Guardar</button>
       <button class="btn btn-primary" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></td>
      </tr>
      
</table>
 </form >
      </div>
    </div>
    </div>
  
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<script src="../recursos/js/bootstrap.min.js"></script>
	<?php 
	//codigo para guardar y volver a la pagina de tipoinformacion.php
	if(isset($_POST["crear_uno"])){
			 $insertar = "insert into tipoinformacion values(nextval('tipoinformacion_tipoinformacionid_seq'),'".$_POST['nombre']."','".$_POST['desc']."');";
			 $conex=conectar();
	pg_query($conex,$insertar) or die (pg_last_error($conex));
	iraURL('../administrator/tipoinfo.php');		
	llenarLog(1,"Tipo de Información");
	}
	//codigo para guardar y volver a recargar la pagina para crear otro
	if(isset($_POST["crear_otro"])){
			 $insertar = "insert into tipoinformacion values(nextval('tipoinformacion_tipoinformacionid_seq'),'".$_POST['nombre']."','".$_POST['desc']."');";
			 $conex=conectar();
	pg_query($conex,$insertar) or die (pg_last_error($conex));
	iraURL('../administrator/creartipoinfo.php');	
	llenarLog(1,"Tipo de Información");	
	}
	?>
</body>
</html>
