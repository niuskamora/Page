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
<link href="../recursos/footable/css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="../recursos/footable/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
<link href="../recursos/footable/css/footable.paginate.css" rel="stylesheet" type="text/css" />
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
            <li><a href="info.php"> <em> <b>Información </b> </em> </a></li>
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
          
              <button class="btn btn-primary dropdown-menu btn-large text-left" onClick="location.href='crearinfo.php'"> <span class="add-on"><i class="icon-plus "></i></span> Crear   </button>
             <button class="btn btn-primary dropdown-menu btn-large text-left " onClick="location.href='principal.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras   </button>
        
        </div>
      </div>
    </div>
    <div class="span9">
    <?php
		
		$SQL="SELECT * FROM informacion";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);

     	if($registros == 0){
    	?>
    		<div class="alert alert-block">
   			<h2 class="alert alert-block">Atención</h2>
    		<h4>No Existen Registros en Información</h4>
   			</div>
     <?php 
		}else{
	?>
    
      <div class="well well-large">
        <p>
        <table class="footable table-striped table-hover" data-page-size="5">
        	<thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Id</span>
				  </th>
				  <th>
					<span>Título</span>
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					Descripción
				  </th>
                  <th data-hide="phone" data-sort-ignore="true">
					Enlace
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					<span class="add-on"> <i class="icon-pencil"></i> </span> Editar 
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
				<span class="add-on"><i class="icon-trash"></i></span> Eliminar 
				  </th>
                  <th data-hide="phone" data-sort-ignore="true">
				<span class="add-on"><i class="icon-eye-open"></i></span> Ver 
				  </th>
				</tr>
			  </thead>
            
           <tbody>
	<form  method="get"> 
      <?php    
		for ($i=0;$i<$registros;$i++){

			$row = pg_fetch_array ($result,$i);
			
			echo '<tr>';
			echo '<td width="10%">'.$row["informacionid"].'</td>';
			echo '<td width="15%">'.$row["titulo"].'</td>';
			echo '<td width="17%">'.$row["descripcion"].'</td>';
			echo '<td width="18%">'.$row["enlace"].'</td>';
			echo '<td width="14%"> <a href="editarinfo.php?id='.$row["informacionid"].'&boton=editar"> <button class="btn btn-primary"  type="button" name="boton"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button>  </td></a>';
			echo '<td width="15%"> <a href="editarinfo.php?id='.$row["informacionid"].'&boton=eliminar"> <button class="btn btn-primary"  type="button" name="boton"> <span class="add-on"><i class="icon-trash"></i> </span> Eliminar  </button>  </td></a>';
			echo '<td width="12%"> <a href="editarinfo.php?id='.$row["informacionid"].'&boton=ver"> <button class="btn btn-primary"  type="button" name="boton"> <span class="add-on"><i class="icon-eye-open"></i> </span> Ver  </button>  </td></a>';
			echo '</tr>';
			}
		?>
	</form>
    </tbody>
</table>

 <?php } ?>

<ul id="pagination" class="footable-nav"><span>Pages:</span></ul>
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
<script src="../recursos/footable/js/footable.js" type="text/javascript"></script>
<script src="../recursos/footable/js/footable.paginate.js" type="text/javascript"></script>
<script src="../recursos/footable/js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script>
	</body>
</html>