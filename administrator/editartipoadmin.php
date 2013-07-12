<?php
session_start();
include("../recursos/funciones.php");
$conn=conectar();

switch( $_GET['boton'] ) {
case "eliminar": $SQL="DELETE FROM tipoadministrador WHERE tipoadministradorid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		javaalert("El tipo de administrador fue eliminado");
		iraURL("tipoadmin.php");
		
	
break;
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
            <li><a href="producto.php">Producto</a</li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
            <li><a href="tipoadmin.php"> <em> <b> Tipo Administrador</b> </em>  </a></li>
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
        
         <div class="btn-group btn-group-vertical">
          
             <button class="btn btn-primary dropdown-menu btn-large text-left"> <span class="add-on"><i class="icon-plus "></i></span> Crear   </button>
            
             
             <button class="btn btn-primary dropdown-menu btn-large text-left "> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras   </button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        
       <?php
	   $SQL="SELECT * FROM tipoadministrador WHERE tipoadministradorid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$row = pg_fetch_array ($result,$i);
	   ?>
	   
	   
		<table width="100%" class="table table-striped table-hover">
      <th> Id  </th>
      <th> Nombre </th>
      <th> Descripcion </th>
      <th> Eliminar  </th>
    
      <?php   
	  
	
			
			echo '<tr>';
		
			echo '<td width="20%"><input id="nombres" name="nombres"  type="text" value="'.$row["nombre"].'" contenteditable="true ></td>';
			echo '<td width="40%"><input id="descripcionn" name="descripcionn"  type="text" value="'.$row["descripcion"].'" contenteditable="true ></td>';
			echo '<tr>';
			echo '<td width="14%"><button id="guardar" name="guardar" class="btn-primary text-center" type="submit"> <span class="add-on"><i class="icon-pencil"></i></span>Guardar</button></td>';
			echo '</tr>';
		?>
       
</table>

	 </form> 	

		
    	<?php
		
if(isset($_POST["guardar"])){
		$id=$_POST['id'];
		$nombre=$_POST['nombres'];
		$descripcion=$_POST['descripcionn'];
        pg_query($conn,"UPDATE tipoadministrador SET tipoadministradorid=$id, nombre='$nombre', descripcion='$descripcion' where tipoadministradorid=$id") or die(pg_last_error($conn));
javaalert("El tipo de administrador fue creado con exito");
iraURL("tipoadmin.php");
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
