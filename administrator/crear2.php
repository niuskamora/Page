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
            <li><a href="usuario">Usuario</a></li>
            <li><a href="menu.php"> <em><b>Menú</b></em></a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
            <li><a href="tipoadmin.php"> Tipo Administrador  </a></li>
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
              <li class="active"><a href="menu.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras </a></li>

          </ul>


        
      </div>
    </div>
   
    
      <?php 
		
		$SQL="SELECT * FROM menu";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		
	
	?>
     <div class="span9 well well-large">
      <br><br>
      
      
        <p>
        <?php
		

	//mostrar resultados
	?>
    <form method="post">
	 <table class="footable table-striped table-hover" data-page-size="5">
			  <thead>
				<tr>
				  <th data-class="expand" data-sort-initial="true" data-type="numeric">
				
					<span>Nombre</span>
				  </th>
				  <th data-hide="phone" data-sort-ignore="true">
					Submenu
				  </th>
                  	<th data-hide="phone" data-sort-ignore="true">
					administrador
				  </th>
                  <th data-hide="phone" data-sort-ignore="true">
					enlace
				  </th>

 <th data-hide="phone" data-sort-ignore="true">
					<span class="add-on"> <i class="icon-pencil"></i> </span> Editar 
				  </th>
				</tr>
			  </thead>
				<tbody>
     
   
      <?php   
	  
		for ($i=0;$i<$registros;$i++)
			{

			$row = pg_fetch_array ($result,$i );
			
			
			
			
			 if($row["submenu"]==$_GET['id']){
				 echo '<tr>';
			
	      echo '<td width="16%">'.$row["nombre"].' </td> </a>';
		   $SQL7="SELECT * FROM menu WHERE menuid=".$_GET["id"];
		$result7 = pg_query ($conn, $SQL7 ) or die("Error en la consulta SQL");
		$row7 = pg_fetch_array ($result7);
		   echo '<td width="16%">'.$row7["nombre"].' </td> </a>';
		 
		  		 
			$SQL3="SELECT nombre FROM administrador WHERE administradorid=".$row["administradorid"];
		$result3 = pg_query ($conn, $SQL3 ) or die("Error en la consulta SQL");
		$row3 = pg_fetch_array ($result3);
		echo '<td width="15">'.$row3["nombre"].' </td>';
		echo '<td width="15">'.$row["enlace"].' </td>';	 
			echo '<td width="14%"> <a href="editarmenu.php?id='.$row["menuid"].'&boton=editar"> <button class="btn btn-primary"  type="button" name="boton"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button>  </td></a>';
			echo '</tr>';
            
			
			 }

			}

		?>
        </tbody>	  
    </table>
     
    <div class="span9">   <ul id="pagination" class="footable-nav"><span>Pages:</span></ul></div>
    <div class="offset11 span1"></div>
    
    		<div class="span3 well well-small"><b>Nombre</b></div>
           <div class="span6 well well-small "><input id="nombre" name="nombre" type="text" value="" contenteditable=true required/> </div>
           
			<?php $SQL2="SELECT * FROM menu WHERE menuid=".$_GET["id"];
		$result2 = pg_query ($conn, $SQL2 ) or die("Error en la consulta SQL");
		$row2 = pg_fetch_array ($result2); ?>
        
            <div class="span3 well well-small"><b>Submenu</b></div>
            <div class="span6 well well-small"><?php echo $row2["nombre"];?></div>
            <div class="span3 well well-small"><b>Administrador</b></div>
           <?php $SQL5="SELECT nombre FROM administrador WHERE administradorid=".$_SESSION["id_usuario"];
		$result5 = pg_query ($conn, $SQL5 ) or die("Error en la consulta SQL");
		$row5 = pg_fetch_array ($result5); ?>
            <div class="span6 well well-small"><?php echo $row5["nombre"];?></div>
            <div class="span3 well well-small"><b>Enlace</b></div>
            <div class="span6 well well-small"><input id="enlace" name="enlace"  type="text" value="" contenteditable=true required/></div>
            
                <div align="center" class="span9 well well-small"><button id="guardar" name="guardar" class="btn-primary text-center" type="submit"> <span class="add-on"><i class="icon-pencil"></i></span>Guardar</button></div>
           

	 
</form> 	
    



		
 	<?php
	
		
if(isset($_POST["guardar"])){
		
		$nombre=$_POST['nombre'];
		$submenu=$_GET["id"];
		$admin=$_SESSION["id_usuario"];
		$enla=$_POST['enlace'];
       
	$resultado=pg_query($conn,"INSERT INTO menu values( nextval('menu_menuid_seq'),'$nombre','$submenu','$admin','$enla')") or die(pg_last_error($conn));
	
	if($resultado){
			
			llenarLog(1, "Creo submenu");
			iraURL('../administrator/crear2.php?id='.$_GET['id']);
		}


}
?>
           
        
         </p>
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