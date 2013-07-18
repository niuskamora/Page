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
        
          <ul class="nav  nav-pills nav-stacked">
              <li class="active"><a href="crearmenu.php"> <span class="add-on"><i class="icon-plus "></i></span> Crear </a></li>
              <li><a href="menu.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</a></li>
            
          </ul>
          

        
      </div>
    </div>
    <div class="span9">
   
      <?php 
		
		 $SQL="SELECT * FROM sucursal WHERE sucursalid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$row = pg_fetch_array ($result);
		
		
		
		if($registros=0){
		 
			?>  
            
            <div class="well alert alert-danger">
    <h2 class="alert alert-danger">Atención</h2>
    <h4>no se puede eliminar el registro de sucursal</h4>
	 </div>
     
     
     <?php
		  }
		else {
		
    ?>
    
    
    
    
    
    <div class="well well-small alert alert-block">
    <h2 class="alert alert-block">Atención</h2>
    <h4>Desea eliminar el registro de sucursal</h4>
   
    </div>

      <div class="well well-large">
      <br><br>
      
      <form method="post">
	    <table class="footable table-striped table-hover" data-page-size="5">
			  <thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
					<span>Nombre</span>
				  </th>
				  <th>
					<span>Descripcion</span>
				  </th>
                   <th>
					<span>direccion</span>
				  </th>
                
				 
				</tr>
			  </thead>
				<tbody>
	  
      <?php   
	  echo '<tr>';
		echo '<td width="30%">  <label>'.$row["nombre"].' </label></td>';
			
			echo ' <td width="30%"> <label>'.$row["descripcion"].' </label></td>';
			echo ' <td width="40%"> <label>'.$row["direccion"].' </label></td>';
			
			
			echo '</tr>';
		?>
 </tbody>	  
    </table>
    
    <button id="si" name="si" class="btn-primary text-center " type="submit">  Si  </button>
     <button id="no" name="no" class="btn-primary text-center " type="submit">  No </button>
	 </form> 
    
     	<?php
		   
		
		
		
		}
		
if(isset($_POST["si"])){
	   $SQL="DELETE FROM sucursal WHERE sucursalid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		llenarLog(3, "elimino sucursal");
		javaalert("sucursal fue eliminado");
		iraURL("sucursal.php");
		
	
}
if(isset($_POST["no"])){
		iraURL("sucursal.php");  
	
}
?>
      


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