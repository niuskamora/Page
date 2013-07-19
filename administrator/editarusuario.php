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
            <li><a href="admin.php">Administrador</a></li>
            <li><a href="usuario.php"><em> <b>Usuario</b> </em></a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación </a></li>
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
             <li class="active"><a href="usuario.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li> 
          </ul>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
       <?php
        	$cons="SELECT * FROM usuario WHERE usuarioid=".$_GET['id'];
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			$row=pg_fetch_array($resulta)
		?>
     <form method="post">
          <div class="row-fluid">
            <dl class="dl-horizontal">
              <dt>
                <div class=" well well-small" align="left"> Nombre </div>
              </dt>
              <dd>
                <div class=" well well-small">
                  <input id="nombre" name="nombre"  type="text" value="<?php echo $row['nombre']?>"  maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" autofocus contenteditable=true required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left"> Apellido </div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="text" name="apellido" id="apellido" value="<?php echo $row['apellido']?>" maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" required/>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left">Dirección</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="text" name="direccion" id="direccion" value="<?php echo $row['direccion']?>" maxlength="254" required/>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Nombre de Usuario</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="text" name="usuario" id="usuario" value="<?php echo $row['usuario']?>" maxlength="34" pattern="[A-ZÑ]{1}[a-z.ñ0-9]{1,33}" required/>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Contraseña </div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="password" name="contrasena" id="contrasena" value="<?php echo $row['contrasena']?>" maxlength="34" pattern="[A-Za-z.0-9]{1,34}" required/>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Confirmar ontraseña</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="password" name="contrasena_c" id="contrasena_c" value="<?php echo $row['contrasena']?>" maxlength="34" pattern="[A-Za-z.0-9]{1,34}" required/>
                </div>
              </dd>
                <div class="well well-small" align="center">
                  <button id="guardar" name="guardar" class="btn btn-primary" type="submit"> <span class="add-on"></span>Modificar</button>
                </div>
             
            </dl>
          </div>
        </form>

      </div>
    </div>
    </div>
  
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<script src="../recursos/js/bootstrap.min.js"></script>
   <?php
		
if(isset($_POST["guardar"])){
		if(isset($_POST["nombre"]) &&  isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"]) && $_POST["nombre"]!="" && $_POST["apellido"]!="" && $_POST["direccion"]!="" && $_POST["usuario"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!=""){
		$SQL="SELECT * FROM usuario where usuario='".$_POST["usuario"]."' and usuarioid!=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		if($registros == 0){
			if($_POST["contrasena"]==$_POST["contrasena_c"]){
					$id=$_GET['id'];
					$nombre=$_POST['nombre'];
					$apellido=$_POST['apellido'];
					$direccion=$_POST['direccion'];
					$usuario=$_POST['usuario'];
					$contrasena=$_POST['contrasena'];
					$resultado=pg_query($conn,"UPDATE usuario SET nombre='$nombre', apellido='$apellido' , direccion='$direccion', usuario='$usuario', contrasena='$contrasena' where usuarioid=$id") or die(pg_last_error($conn));
					if($resultado){
						llenarLog(2, "Usuario");
						javaalert("El usuario fue modificado con éxito");
						iraURL("usuario.php");
					}
			}else{
					javaalert("Las contraseñas no coinciden, por favor verifique");
				}		
		}else{
			javaalert("El nombre de usuario ya esta registrado, por favor verifique");

		}			
		}else{
						javaalert("Debe agregar todos los campos, por favor verifique");

		}
}
?>
</body>
</html>