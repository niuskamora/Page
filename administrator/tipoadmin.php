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
            <li><a href="admin.php">Administrador</a></li>
            <li><a href="usuario">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
            <li><a href="tipoadmin.php">Tipo Administrador</a></li>
            <li><a href="index.php">Cerrar Sesión</a></li>
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
              <li class="active"><a href="#"> <span class="add-on"><i class="icon-plus "></i></span> Crear </a></li>
              <li><a href="#"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</a></li>
            
          </ul>
          

        
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
      <br><br>
       <div class="span1">ID</div>
      <div class="span3">nombre</div>
      <div class="span6">descripcion</div>
      <div class="span1">editar</div>
      <div class="span1">eliminar</div>
      
      
      <div class="span1">1</div>
      <div class="span3">pepe</div>
      <div class="span6">hola como estas</div>
      <div class="span1">editar</div>
      <div class="span1">eliminar</div>
      
        <p>
        <?php
		
		$SQL="SELECT * FROM tipoadministrador";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);

	//mostrar resultados
	?>
	<table width="100%" class="table table-striped table-hover">
      <th> Id  </th>
      <th> Nombre </th>
      <th> Descripción </th>
      <th> <span class="add-on"> <i class="icon-pencil"></i> </span> Editar  </th>
      <th><span class="add-on"><i class="icon-trash"></i></span> Eliminar  </th>
    <form action="editartipoadmin.php" method="get"> 
     
      <?php   
	  
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			
			echo '<tr>';
			echo '<td width="10%">'.$row["tipoadministradorid"].'</td>';
			echo '<td width="20%">'.$row["nombre"].'</td>';
			echo '<td width="44%">'.$row["descripcion"].'</td>';
			echo '<td width="12%"> <a href="editartipoadmin.php?id='.$row["tipoadministradorid"].'&boton=editar" <button class="btn btn-primary  type="submit" name=boton value=ed> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button> </td> >';
			echo '<td width="14%"> <button class="btn btn-primary" name=boton value=eliminar> <span class="add-on"><i class="icon-trash"></i></span> Eliminar</button> </td>';
			echo '</tr>';
		
			
            
			}
			
    
		?>
	 </form> 	
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
