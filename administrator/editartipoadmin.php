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
            <li><a href="tipoadmin.php"> <em> <b> Tipo Administrador</b> </em>  </a></li>
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
              <li class="active"><a href="tipoadmin.php"> <span class="add-on"><i class="icon-plus "></i></span> Atras </a></li>

          </ul>

      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        
       <?php
	   $SQL="SELECT * FROM tipoadministrador WHERE tipoadministradorid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$row = pg_fetch_array ($result);
	   ?>
       <form method="post">
	    <div class="row-fluid">
         
                 <div class="span4">
                 Nombre                 
                 </div>
                 <div class="span4">
                 <input id="nombres" name="nombres"  type="text" value="<?php $row["nombre"]?>" contenteditable=true required/>
                 </div>
               </div>
            
                 <div class="span4">
                 Descipcion                 
                 </div>
                 <div class="span4">
         <input id="descripcionn" name="descripcionn"  type="text" value="<?php $row["descripcion"] ?>" contenteditable=true required/>
                   </div>
                 
          
        
        </div>
		  <div class="span12">
          	
    <button id="guardar" name="guardar" class="btn-primary text-center" type="submit"> <span class="add-on"><i class="icon-pencil"></i></span>Guardar</button>

       </div>
	 </form> 


    <ul id="pagination" class="footable-nav"><span>Pages:</span></ul>		
    	<?php
		
if(isset($_POST["guardar"])){
		$id=$_GET['id'];
		$nombre=$_POST['nombres'];
		$descripcion=$_POST['descripcionn'];
        $resultado=pg_query($conn,"UPDATE tipoadministrador SET nombre='$nombre', descripcion='$descripcion' where tipoadministradorid=$id") or die(pg_last_error($conn));
		if($resultado){
			llenarLog(2, "Modifico tipo de administrador");
javaalert("El tipo de administrador fue modificado con exito");
iraURL("tipoadmin.php");
		}
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
