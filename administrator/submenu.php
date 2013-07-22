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
   
    
      <?php 
		
		$SQL="SELECT * FROM menu";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$aux=0;
		  
		for ($i=0;$i<$registros;$i++)
			{
			$row = pg_fetch_array ($result,$i );
			
			if($row["submenu"]==$_GET['id']){
				$aux=$aux+1;
			 }
			}
	
	?>
     <div class="span9 well well-large">
  
        <p>
        <?php
		

	//mostrar resultados
	
	?>
    <form method="post">
    <?php
    if($aux!=0){
		
		?>
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
                   <th data-hide="phone" data-sort-ignore="true">
					<span class="add-on"> <i class="icon-trash"></i> </span> Eliminar
				  </th>
				</tr>
			  </thead>
				<tbody>
     
   
      <?php 
	  $SQL="SELECT * FROM menu";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);  
	  $registros= pg_num_rows($result);
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
		echo '<td width="30">'.$row3["nombre"].' </td>';
		echo '<td width="30">'.$row["enlace"].' </td>';	 
			echo '<td width="15%"> <a href="editarmenu.php?id='.$row["menuid"].'&boton=editar"> <button class="btn btn-primary"  type="button" name="boton"> <span class="add-on"><i class="icon-pencil"></i> </span> Editar  </button>  </td></a>';
			echo '<td width="15%">  <a href="eliminarmenu.php?id='.$row["menuid"].'&boton=eliminar"> <button class="btn btn-primary"  type="button"  name="boton"> <span class="add-on"><i class="icon-trash"></i> </span> Eliminar  </button>  </td></a>';
			echo '</tr>';
            
			
			 }

			}

		?>
        </tbody>	  
    </table>
      <div class="span12">   <ul id="pagination" class="footable-nav"><span>Pages:</span></ul></div>
     <?php }else{  ?>
		 <div class="well alert alert-block">
   
    <h4>No existen submenú </h4>
    </div>
		 
		 
	<?php } ?>
     
   </br>
   </br>
   <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#demo">
    Presione Aquí para crear
</button>
 
<div id="demo" class="collapse">
      <div class="row-fluid">
            <dl class="dl-horizontal">
              <dt>
                <div class=" well well-small"><b>Nombre</b></div>
              </dt>
              <dd>
                <div class=" well well-small">
           <input id="nombre" name="nombre" type="text" value="" contenteditable=true required/> 
            </div>
            </dd>
           
           
			<?php $SQL2="SELECT * FROM menu WHERE menuid=".$_GET["id"];
		$result2 = pg_query ($conn, $SQL2 ) or die("Error en la consulta SQL");
		$row2 = pg_fetch_array ($result2); ?>
        
             <dt>
                <div class=" well well-small"><b>Submenu</b></div>
              </dt>
              <dd>
                <div class=" well well-small"><?php echo $row2["nombre"];?></div>
              </dd>
            <dt>
                <div class=" well well-small"><b>Administrador</b></div></dt>
           <?php $SQL5="SELECT nombre FROM administrador WHERE administradorid=".$_SESSION["id_usuario"];
		$result5 = pg_query ($conn, $SQL5 ) or die("Error en la consulta SQL");
		$row5 = pg_fetch_array ($result5); ?>
             <dd>
                <div class=" well well-small"><?php echo $row5["nombre"];?></div>
             </dd>  
           <dt>
                <div class=" well well-small"><b>Enlace</b></div></dt>
             <dd>
                <div class=" well well-small"><input id="enlace" name="enlace"  type="text" value="" contenteditable=true required/></div>
                </dd>
             <dd>
                <div align="left" class="well well-small"><button id="guardar" name="guardar" class="btn btn-primary text-center" type="submit"> Guardar</button>
                 </div>
              </dd>
            </dl>
       </div>        
  </div>
	 
</form> 	
    

  </div>

		
 	<?php
	
		
if(isset($_POST["guardar"])){
	
	if($_POST["nombre"]!='' && $_POST["enlace"]!=''){
		
		$nombre=$_POST['nombre'];
		$submenu=$_GET["id"];
		$admin=$_SESSION["id_usuario"];
		$enla=$_POST['enlace'];
		
       
	$resultado=pg_query($conn,"INSERT INTO menu values( nextval('menu_menuid_seq'),'$nombre','$submenu','$admin','$enla')") or die(pg_last_error($conn));
	
	if($resultado){
			
			llenarLog(1, "Creo submenu");
			iraURL('../administrator/submenu.php?id='.$_GET['id']);
		}
	}else{
		javaalert("Debe llenar todos los campos obligatorios");
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