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
            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php"><em> <b>Tipo Infomación </b> </em></a></li>
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
       <?php
        	$cons="SELECT * FROM tipoinformacion WHERE tipoinformacionid="$_GET['id'];;
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			
		if($row=pg_fetch_array($resulta)){
		?>
      <form method="post">
  <table class="table table-striped table-hover">
	      <th> Nombre </th>
	      <td> <input type="text" name="nombre" id="nombre" required value="<?php echo $row[1];?>"/></td>
      </tr>
	  <tr>
	    <th> Descripción </th>
	    <td>  <input type="text" id="redactor" name="redactor" required value="<?php echo $row[2];?>"/></td>
      </tr>
   <tr>
      <td> </td> <td><button name="editar" id="editar" type="submit" class="btn-primary text-center">Modificar</button></td>
    </tr>
      
</table>
 </form >
  <?php }?>
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
