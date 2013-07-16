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
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="#">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav slidernav">
            <li><a href="admin.php"> <em> <b> Administrador </b> </em> </a></li>
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
          <ul class="nav  nav-pills nav-stacked">
              <li class="active"><a href="admin.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</a></li>
          </ul>
      </div>
    </div>
    
    <div class="span9">
      <div class="well well-large">
        <p>
        
		<form method="post">
        	<table width="100%" class="table table-bordered">
            	<tr>
                	<th>Nombre</th>
                    <td><input id="nombre" name="nombre" type="text" required/></td>
                </tr>
                <tr>
                	<th>Apellido</th>
                    <td><input id="apellido" name="apellido" type="text" required/></td>
                </tr>
                <tr>
                	<th>Usuario</th>
                    <td><input id="usuario" name="usuario" type="text" required/></td>
                </tr>
                <tr>
                	<th>Contraseña</th>
                    <td><input id="contrasena" name="contrasena" type="password" required/></td>
                </tr>
                <tr>
                	<th>Confirmar contraseña</th>
     				<td><input type="password" name="contrasena_c" id="contrasena_c" required/></td>
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
                
                <tr> <td></td>
                <td><button name="guardar" id="guardar" type="submit" class="btn-primary text-center">Guardar</button></td>
                 </tr>
                 
                 <tr><td></td>
                 <td><button id="guardar2" name="guardar2" class="btn-primary text-center" type="submit">Guardar y añadir otro</button></td></tr>
                
            </table>
        </form>
<?php

if(isset($_POST["guardar"]) || isset($_POST["guardar2"])){
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$tipoadmin=$_POST['tipoadmin'];

	$SQL="SELECT * FROM administrador where usuario='$usuario'";
	$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
	$registros= pg_num_rows($result);
	
	if($registros == 0){

		if($_POST["contrasena"]==$_POST["contrasena_c"]){
			$resultado=pg_query($conn,"INSERT INTO administrador values( nextval('administrador_administradorid_seq'),'$nombre','$apellido','$usuario','$contrasena',".$_SESSION["id_usuario"].",'$tipoadmin')") or die(pg_last_error($conn));
	
			if($resultado){
				javaalert('Se Creo un Administrador');
				llenarLog(1, "Creo Administrador");
				if(isset($_POST["guardar"])){
					iraURL('../administrator/admin.php');
				}
				else{
					iraURL('../administrator/crearadmin.php');
				}
			}
		}else{
			javaalert("Las contraseñas no coinciden, por favor verifique");
		}
	}else{
		javaalert("El nombre de usuario ya esta registrado, por favor verfique");
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
