<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();

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
            <li><a href="#servicios"> <b> Administrador </b> </a></li>
            <li><a href="#productos"> <b>Usuario</b></a></li>
            <li><a href="#tecnologia"> <b>Menu</b></a></li>
            <li><a href="#nosotros"> <b>Informacion</b></a></li>
            <li><a href="#contacto"> <b>Producto</b></a></li>
            <li><a href="#tecnologia"> <b>Sucursal</b></a></li>
            <li><a href="#nosotros"> <b>Tipo Info</b></a></li>
            <li><a href="#contacto"> <b>Tipo Admin</b></a></li>
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
          
              <button class="btn btn-primary dropdown-menu btn-large text-left" onClick="location.href='crearadmin.php'" <span class="add-on"><i class="icon-plus "></i></span> Crear   </button>
             <button class="btn btn-primary dropdown-menu btn-large text-left " onClick="location.href='principal.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras   </button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        <?php
		
		$SQL="SELECT * FROM administrador";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);

	//mostrar resultados
	?>
		<table width="60%" class="table table-striped table-hover" align="center">
        	<th>Ide</th>
        	<th>Nombre</th>
        	<th>Apellido</th>
            <th>Usuario</th>
            <th>Editar</th>
      		<th>Eliminar</th>
            <th>Ver Mas</th>
      <?php    
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			
			echo '<tr>';
			echo '<td width="10%">'.$row["administradorid"].'</td>';
			echo '<td width="15%">'.$row["nombre"].'</td>';
			echo '<td width="19%">'.$row["apellido"].'</td>';
			echo '<td width="19%">'.$row["usuario"].'</td>';
			echo '<td width="12%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td width="14%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td width="11%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
			echo '</tr>';
			}
		?>
		
</table>

         </p>
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
