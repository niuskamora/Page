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
  <form method="post">
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
            		  <li class="active"><a href="usuario.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás </a></li>
        		  </ul>
        </div>
    </div>
    <div class="span9 well well-large" >
 			<p>
            <div class="span3 well well-small"><b>Nombre</b></div>
            <div class="span6 well well-small "><input type="text" name="nombre" id="nombre"  maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" autofocus required/></div>
            <div class="span3 well well-small"><b>Apellido</b></div>
            <div class="span6 well well-small "><input type="text" name="apellido" id="apellido" maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" required/></div>
            <div class="span3 well well-small"><b>Dirección</b></div>
            <div class="span6 well well-small"><input type="text" name="direccion" id="direccion" maxlength="254" required/></div>
            <div class="span3 well well-small"><b>Nombre de Usuario</b></div>
            <div class="span6 well well-small"><input type="text" name="usuario" id="usuario" placeholder="Ej. Guardian604" maxlength="34" pattern="[A-ZÑ]{1}[a-z.ñ0-9]{1,33}" required/></div>
            <div class="span3 well well-small"><b>Contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena" id="contrasena" maxlength="34" pattern="[A-Za-z.0-9]{1,34}" required/></div>
            <div class="span3 well well-small"><b>Confirmar contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena_c" id="contrasena_c" maxlength="34" pattern="[A-Za-z.0-9]{1,34}" required/></div>
            <div class="span9 well well-small" align="center"><button class="btn btn-primary" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
			<div class="span9 well well-small" align="center"> <button class="btn btn-primary" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></div>
            </p>
    </div>
    </div>
 
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<?php 
	//codigo para guardar
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){

	if(isset($_POST["nombre"]) &&  isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"]) && $_POST["nombre"]!="" && $_POST["apellido"]!="" && $_POST["direccion"]!="" && $_POST["usuario"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!=""){
		$SQL="SELECT * FROM usuario where usuario='".$_POST["usuario"]."'";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		if($registros == 0){
				if($_POST["contrasena"]==$_POST["contrasena_c"]){
						$insertar = "insert into usuario values(nextval('usuario_usuarioid_seq'),'".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['direccion']."','".$_POST['usuario']."','".$_POST['contrasena']."',".$_SESSION["id_usuario"].");";
						$conex=conectar();
						pg_query($conex,$insertar) or die (pg_last_error($conex));
						llenarLog(1,"USUARIO");
						if(isset($_POST["crear_uno"])){
						iraURL('../administrator/usuario.php');		
						}else{
						iraURL('../administrator/crearusuario.php');	
							}
				}else{
					javaalert("Las contraseñas no coinciden, por favor verifique");
				}
		}//fin de $registros
		else{
			javaalert("El nombre de usuario ya esta registrado, por favor verifique");
		}
	}//fin de isset
	else{
				javaalert("Debe agregar todos los campos, por favor verifique");
			}
			
			
		}				
	?>
    
     </form>
     
</body>
</html>
