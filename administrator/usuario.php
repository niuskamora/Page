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
<link href="../recursoscss/bootstrap-responsive.css" rel="stylesheet">
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
         <ul class="nav">
            <li class="dropdown"> <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown"> Gestion Usuarios <b class="caret"></b> </a>
              <ul class="dropdown-menu">
                <li><a href="tipoadmin.php"> Tipo Administrador </a></li>
                <li><a href="admin.php">Administrador</a></li>
                <li><a href="usuario">Usuario</a></li>
              </ul>
            </li>
            <li><a href="menu.php"> <em><b>Menú</b></em></a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li class="dropdown">
             <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown">
              Gestion Informacion <b class="caret"></b> </a>
              <ul class="dropdown-menu">
                <li><a href="tipoinfo.php">Tipo Infomación</a></li>
                <li><a href="info.php">Información</a></li>
              </ul>
            </li>
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
        
          <ul class="nav  nav-pills nav-stacked">
              <li class="active"><a href="crearusuario.php"> <span class="add-on"><i class="icon-plus "></i></span> Crear </a></li>
              <li><a href="principal.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</a></li>
            
          </ul>
          

        
      </div>
    </div>
    <div class="span9">
      <?php 
		$SQL="SELECT * FROM usuario";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
	if($registros == 0){
    ?>
    <div class="alert alert-block" align="center">
   <h2 class="alert alert-block">Atención  
    <h4>No existen registros en usuario</h4>
    </h2>
   
    </div>
     <?php 
	}else{
	
	?>
      <div class="well well-large">
        <p>
				<table width="100%" class="footable table-striped table-hover" data-page-size="5">
      <thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Id</span>
				  </th>
				  <th><span>Nombre</span></th>
                  <th><span>Apellido</span></th>
				  <th data-hide="phone" data-sort-ignore="true">
					Dirección
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
      <?php    
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			
			echo '<tr>';
			echo '<td width="10%">'.$row[0].'</td>';
			echo '<td width="15%">'.$row[1].'</td>';
			echo '<td width="15%">'.$row[2].'</td>';
			echo '<td width="22%">'.$row[3].'</td>';
			echo '<td width="13%"><a href="editarusuario.php?id='.$row[0].'&boton=editar"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td>';
			echo '<td width="14%"><a href="eliminarusuario.php?id='.$row[0].'&boton=eliminar"> <button class="btn btn-primary" type="button"  name="eliminar"> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '<td width="11%"> <button class="btn btn-primary"> <span class="add-on"><i class="icon-eye-open"></i></span> Ver</button> </td>';
			echo '</tr>';
			}
		?>
		</tbody>	
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
