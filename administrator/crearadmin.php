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
            <li><a href="#servicios"> <b> Administrador </b> </a></li>
            <li><a href="#productos"> <b>Usuario</b></a></li>
            <li><a href="#tecnologia"> <b>Menu</b></a></li>
            <li><a href="#nosotros"> <b>Informacion</b></a></li>
            <li><a href="#contacto"> <b>Producto</b></a></li>
            <li><a href="#tecnologia"> <b>Sucursal</b></a></li>
            <li><a href="#nosotros"> <b>Tipo Info</b></a></li>
            <li><a href="#contacto"> <b>Tipo Admin</b></a></li>
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
             
             <button class="btn btn-primary dropdown-menu btn-large text-left " onClick="location.href='principal.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        
		<form method="post">
        	<table width="100%" class="table table-bordered">
            	<tr>
                	<th>Nombre</th>
                    <td><input id="nombre" name="nombre" type="text" /></td>
                </tr>
                <tr>
                	<th>Apellido</th>
                    <td><input id="apellido" name="apellido" type="text" /></td>
                </tr>
                <tr>
                	<th>Usuario</th>
                    <td><input id="usuario" name="usuario" type="text" /></td>
                </tr>
                <tr>
                	<th>Contraseña</th>
                    <td><input id="contrasena" name="contrasena" type="password" /></td>
                </tr>
                <tr>
                	<th>Tipo Administrador</th>
                    <td><select id="tipoadmin" name="tipoadmin">
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
                
                <tr>
                	<td> </td> <td><button class="btn-primary text-center">Guardar</button></td>
                </tr>
                
            </table>
        </form>
		<?php
        pg_query($conn,"INSERT INTO bitacora values( nextval('administrador_administradorid_seq'),'".$nombre."','".$apellido."','".$usuario."','".$contrasena."',".$_SESSION["id_usuario"].",'".$tipoadmin."')") or die(pg_last_error($conex));
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
