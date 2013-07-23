<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();
if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
	}

 
	
		
if(isset($_POST["guardar"])){
		
		$nombr=$_POST['nombre'];
		$enla=$_POST['enlace'];
        $resultado=pg_query($conn,"UPDATE menu SET nombre='$nombr', enlace='$enla' where menuid=".$_GET['id']) or die(pg_last_error($conn));
		if($resultado){
			llenarLog(2, "Modifico tipo de administrador");
javaalert("El menu fue modificado con exito");
iraURL("menu.php");
		}
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
          <ul class="nav">
            <li class="dropdown"> <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown"> Gestion Usuarios <b class="caret"></b> </a>
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
              <li class="active"><a href="menu.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás </a></li>

          </ul>


        
      </div>
    </div>
    <div class="span9">
    
      <?php 
		
		$SQL="SELECT * FROM menu WHERE menuid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		
	
	?>
    
      <div class="well well-large">
   
      
      
        <p>
        <?php
		

	//mostrar resultados
	?>
    <form method="post">
	
     
   
      <?php   
	  
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			?>
		
		
		
		  <div class="row-fluid">
            <dl class="dl-horizontal">
              <dt>
                <div class=" well well-small"> Nombre </div>
              </dt>
              <dd>
                <div class=" well well-small">
                 <input id="nombre" name="nombre"  type="text" value="<?php echo $row["nombre"]?>" contenteditable=true required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small"> submenu </div>
              </dt>
              <dd>
                <div class="well well-small">
                <?php
				
				 if($row["submenu"]!="0"){
			$SQL2="SELECT * FROM menu WHERE menuid=".$row["submenu"];
		$result2 = pg_query ($conn, $SQL2 ) or die("Error en la consulta SQL");
		$row2 = pg_fetch_array ($result2);
	 echo $row2["nombre"];
			 }else{
				 echo $row["submenu"];
			 }
				
				?>
 </div>
              </dd>
              
               <dt>
                <div class=" well well-small"> Administrador</div>
              </dt>
              <dd>
                <div class=" well well-small">
                <?php
				
				$SQL3="SELECT nombre FROM administrador WHERE administradorid=".$row["administradorid"];
		$result3 = pg_query ($conn, $SQL3 ) or die("Error en la consulta SQL");
		$row3 = pg_fetch_array ($result3);
				
				 echo $row3["nombre"]?>
				 
                </div>
              </dd>
              <dt> </dt>
              <dd>
              
              <dt>
                <div class=" well well-small">Enlace</div>
              </dt>
              <dd>
                <div class=" well well-small">
                 <input id="nombre" name="enlace"  type="text" value="<?php echo $row["enlace"] ?>" contenteditable=true required/>
                </div>
              </dd>
               
                <div align="center" class="well well-small">
                  <button id="guardar" name="guardar" class="btn btn-primary text-center" type="submit"> Modificar</button>
                </div>
            
            </dl>
          </div>
		
		
		
            <?php
			}
			
    
		?>
        
      
       
          
	 
</form> 	

           
        
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
