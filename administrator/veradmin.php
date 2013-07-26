<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();

if(!isset($_GET['id'])){
	iraURL('admin.php');
}

if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
}

$id=$_GET['id'];

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
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="principal.php">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav">
            <li class="dropdown active"> <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown"> Gestión Usuarios <b class="caret"></b> </a>
              <ul class="dropdown-menu">
                <li><a href="tipoadmin.php"> Tipo Administrador </a></li>
                <li><a href="admin.php">Administrador</a></li>
                <li><a href="usuario.php">Usuario</a></li>
              </ul>
            </li>
            <li><a href="menu.php"> Menú</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li class="dropdown">
             <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown">
              Gestión Información <b class="caret"></b> </a>
              <ul class="dropdown-menu">
                <li><a href="tipoinfo.php">Tipo Infomación</a></li>
                <li><a href="info.php">Información</a></li>
              </ul>
            </li>
            <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
          </ul> </div>
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
              <li class="active"><a href="admin.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li>
          </ul>
      </div>
    </div>
    
    <div class="span9 well well-large">
        <p>
        
        <?php
        	$cons="SELECT * FROM administrador WHERE administradorid=$id";
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			
			if($row=pg_fetch_array($resulta)){
		?>
        	<div class="span3 well well-small"><b>Id</b></div>
            <div class="span6 well well-small "><?php echo $row['administradorid'];?></div>
            <div class="span3 well well-small"><b>Nombre</b></div>
            <div class="span6 well well-small"><?php echo $row['nombre'];?></div>
            <div class="span3 well well-small"><b>Apellido</b></div>
            <div class="span6 well well-small"><?php echo $row['apellido'];?></div>
            <div class="span3 well well-small"><b>Usuario</b></div>
            <div class="span6 well well-small"><?php echo $row['usuario'];?></div>
            
            	<?php
				if($row['creadorid']!=''){
				
					$cons1="SELECT * FROM administrador WHERE administradorid=".$row['creadorid'];
					$resulta2=pg_query ($conn, $cons1) or die("Error en la consulta SQL");
					if($row1=pg_fetch_array($resulta2)){
					?>
            			<div class="span3 well well-small"><b>Creador</b></div>
            			<div class="span6 well well-small"><?php echo $row1['nombre'];?></div>
                	<?php }
                }?>
                <?php 
				$cons1="SELECT * FROM tipoadministrador WHERE tipoadministradorid=".$row['tipoadministradorid'];
				$resulta2=pg_query ($conn, $cons1) or die("Error en la consulta SQL");
				if($row1=pg_fetch_array($resulta2)){
				?>
            	<div class="span3 well well-small"><b>Tipo de Administrador</b></div>
            	<div class="span6 well well-small"><?php echo $row1['nombre'];?></div>
                <?php }?>
                
        <?php }?>
         </p>
    </div>
    </div>
  
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 

	</body>
</html>