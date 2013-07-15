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
          
             <button class="btn btn-primary dropdown-menu btn-large text-left" onclick="location.href='../administrator/creartipoinfo.php'"> <span class="add-on"><i class="icon-plus "></i></span> Crear   </button>
            
             
             <button class="btn btn-primary dropdown-menu btn-large text-left " onclick="location.href='../administrator/principal.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras   </button>
        
        </div>
      </div>
    </div>
    <div class="span9">
    <?php 
		$SQL="SELECT * FROM tipoinformacion";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
	if($registros == 0){
    ?>
    <div class="alert alert-block" >
    <h2 class="alert alert-block">Atención  
    <h4>No existen registros en tipo de Información</h4>
    </h2>
   
    </div>
     <?php 
	}else{
	
	?>
      <div class="well well-large">
        <p>
      
		<table width="100%" class="table table-striped table-hover">
      <th> Id  </th>
      <th> Nombre </th>
      <th> Descripción </th>
      <th> Editar  </th>
      <th> Eliminar  </th>
  
      <?php    
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			
			echo '<tr>';
			echo '<td width="10%">'.$row[0].'</td>';
			echo '<td width="20%">'.$row[1].'</td>';
			echo '<td width="44%">'.$row[2].'</td>';
			echo '<td width="12%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td width="14%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '</tr>';
			}
		?>
		
</table>
<?php 
	}
?>
		
        
        
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
