<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();

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
              <li class="active"><a href="admin.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li>
          </ul>
      </div>
    </div>
    
    <div class="span9">
      <div class="well well-large">
        <p>
        
        <?php
        	$cons="SELECT * FROM administrador WHERE administradorid=$id";
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			
			if($row=pg_fetch_array($resulta)){
		?>
        
	
            <form method="post">
          <div class="row-fluid">
            <dl class="dl-horizontal">
              <dt>
                <div class=" well well-small" align="left">Nombre</div>
              </dt>
              <dd>
                <div class=" well well-small" align="left">
                  <input id="nombre" name="nombre" type="text" value="<?php echo $row['nombre']; ?>" contenteditable="true" required autofocus/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Apellido</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <input id="apellido" name="apellido" type="text" value="<?php echo $row['apellido']; ?>" contenteditable="true" required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Usuario</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <input id="usuario" name="usuario" type="text" value="<?php echo $row['usuario']; ?>" contenteditable="true" required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Contaseña</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <input id="contrasena" name="contrasena" type="password" value="<?php echo $row['contrasena']; ?>" contenteditable="true" required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Confirmar Contaseña</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <input id="contrasena_c" name="contrasena_c" type="password" value="<?php echo $row['contrasena']; ?>" contenteditable="true" required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Tipo Administrador</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <select id="tipoadmin" name="tipoadmin" contenteditable="true">
                    	<?php 
						
						$consu="SELECT * FROM tipoadministrador WHERE tipoadministradorid=".$row['tipoadministradorid'];
						$resulta1 = pg_query ($conn, $consu) or die("Error en la consulta SQL");
						if($row1=pg_fetch_array($resulta1)){
							echo '<option value="'.$row1['tipoadministradorid'].'">'.$row1['nombre'].'</option>';
                        
                        }
						?>
                    	<option value="0">Seleccione Opción</option>
                        <?php
		
						$SQL="SELECT * FROM tipoadministrador";
						$resulta2 = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						
						while($row2=pg_fetch_array($resulta2)){
							echo '<option value="'.$row2['tipoadministradorid'].'">'.$row2['nombre'].'</option>';

							}

						?>
                    </select>
                </div>
              </dd>
                <div class="well well-small" align="center">
                  <button id="guardar" name="guardar" class="btn btn-primary text-center" type="submit">Modificar</button>
                </div>
            </dl>
          </div>
        </form>
    
        <?php }?>
<?php

if(isset($_POST["guardar"])){
	
	if(isset($_POST["nombre"]) &&  isset($_POST["apellido"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"]) && $_POST["nombre"]!="" && $_POST["apellido"]!="" && $_POST["usuario"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!="" && $_POST["tipoadmin"]>0){
	
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		$tipoadmin=$_POST['tipoadmin'];
		
		$SQL="SELECT * FROM administrador where usuario='$usuario' and administradorid!=".$row['administradorid'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
	
		if($registros == 0){
	
			if($_POST["contrasena"]==$_POST["contrasena_c"]){
				$resultado=pg_query($conn,"UPDATE administrador SET nombre='$nombre', apellido='$apellido', usuario='$usuario', contrasena='$contrasena', tipoadministradorid='$tipoadmin' WHERE administradorid=$id") or die(pg_last_error($conn));
	
				if($resultado){
					javaalert('Se Modifico el Administrador');
					llenarLog(2, "Administrador");
					iraURL('../administrator/admin.php');
				}
			}else{
				javaalert("Las contraseñas no coinciden, por favor verifique");
			}
		}else{
			javaalert("El nombre de usuario ya esta registrado, por favor verfique");
		}
	
	}else{
		javaalert("Ingrese todos los campos");
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