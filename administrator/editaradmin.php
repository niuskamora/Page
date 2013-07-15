<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();

$id=$_GET['id'];

switch( $_GET['boton'] ) {
case "eliminar": $SQL="DELETE FROM administrador WHERE administradorid=$id";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		javaalert("El administrador fue eliminado");
		llenarLog(3, "Eliminar Administrador");
		iraURL('../administrator/admin.php');
		
	
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
            <li><a href="usuario.php">Usuario</a></li>
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
        
         <div class="btn-group btn-group-vertical">
             
             <button class="btn btn-primary dropdown-menu btn-large text-left " onClick="location.href='admin.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        
        <?php
        	$cons="SELECT *FROM administrador WHERE administradorid=$id";
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			
			if($row=pg_fetch_array($resulta)){
		?>
        
		<form method="post">
        	<table width="100%" class="table table-bordered">
            	<tr>
                	<th>Nombre</th>
                    <td><input id="nombre" name="nombre" type="text" value="<?php echo $row['nombre']; ?>"/></td>
                </tr>
                <tr>
                	<th>Apellido</th>
                    <td><input id="apellido" name="apellido" type="text" value="<?php echo $row['apellido']; ?>"/></td>
                </tr>
                <tr>
                	<th>Usuario</th>
                    <td><input id="usuario" name="usuario" type="text" value="<?php echo $row['usuario']; ?>" /></td>
                </tr>
                <tr>
                	<th>Contraseña</th>
                    <td><input id="contrasena" name="contrasena" type="password" value="<?php echo $row['contrasena']; ?>"/></td>
                </tr>
                <tr>
                	<th>Tipo Administrador</th>
                    <td><select id="tipoadmin" name="tipoadmin">
                    	<?php 
						
						$consu="SELECT *FROM tipoadministrador WHERE tipoadministradorid=".$row['tipoadministradorid'];
						$resulta1 = pg_query ($conn, $consu) or die("Error en la consulta SQL");
						if($row1=pg_fetch_array($resulta1)){
							echo '<option value="'.$row1['tipoadministradorid'].'">'.$row1['nombre'].'</option>';
                        
                        }
						?>
                    	<option value="0">Seleccione Opción</option>
                        <?php
		
						$SQL="SELECT * FROM tipoadministrador";
						$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						
						while($row=pg_fetch_array($result)){
							echo '<option value="'.$row['tipoadministradorid'].'">'.$row['nombre'].'</option>';

							}

						?>
                    </select></td>
                </tr>
                <?php }?>
                <tr>
                	<td> </td> <td><button name="guardar" id="guardar" type="submit" class="btn-primary text-center">Modificar</button></td>
                </tr>
                
            </table>
        </form>
<?php

if(isset($_POST["guardar"])){
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$tipoadmin=$_POST['tipoadmin'];


	$resultado=pg_query($conn,"UPDATE administrador SET nombre='$nombre', apellido='$apellido', usuario='$usuario', contrasena='$contrasena', tipoadministradorid='$tipoadmin' WHERE administradorid=$id") or die(pg_last_error($conn));
	
	if($resultado){
			javaalert('Entro');
			llenarLog(2, "Modifico Administrador");
			iraURL('../administrator/admin.php');
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
	</body>
</html>