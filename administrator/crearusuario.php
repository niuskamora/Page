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
<script type="text/javascript">
			function cargar(){
				var barra = document.getElementById('barra')
				 barra.value +=10
				  document.getElementById('barrita').width=80;
			}
	</script>
<style>
/*SITE STYLING*/

#okk input[type="password"],#okk input[type="text"]{
        background:transparent;
    border: 2px solid #46AC84;
color: #777;
font-family: "Lato", sans-serif;
font-size: 14px;
padding: 9px 5px;
height: 21px;
text-indent: 6px;
-webkit-appearance: none;
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
border-radius: 6px;
-webkit-box-shadow: none;
-moz-box-shadow: none;
box-shadow: none;
-webkit-transition: border .25s linear, color .25s linear;
-moz-transition: border .25s linear, color .25s linear;
-o-transition: border .25s linear, color .25s linear;
transition: border .25s linear, color .25s linear;
-webkit-backface-visibility: hidden;
width:100%;
}

#okk{
width: 500px;
margin: 0 auto;
position: relative;
margin-bottom:60px;
}
.strength_meter{
position: absolute;
left: 0px;
top: 0px;
width: 100%;
height: 43px;
z-index:-1;
border-radius:5px;
padding-right:13px;
}
.button_strength {
text-decoration: none;
color: #FFF;
font-size: 13px;
}
.strength_meter div{
    width:0%;
height: 43px;
text-align: right;
color: #000;
line-height: 43px;
-webkit-transition: all .3s ease-in-out;
-moz-transition: all .3s ease-in-out;
-o-transition: all .3s ease-in-out;
-ms-transition: all .3s ease-in-out;
transition: all .3s ease-in-out;
padding-right: 12px;
border-radius:5px;
}
.strength_meter div p{
position: absolute;
top: 22px;
right: 0px;
color: #F06;
font-size:13px;
}

.veryweak{
    background-color: #FFA0A0;
border-color: #F04040!important;
width:25%!important;
}
.weak{
background-color: #FFB78C;
border-color: #FF853C!important;
width:50%!important;
}
.medium{
background-color: #FFEC8B;
border-color: #FC0!important;
width:75%!important;
}
.strong{
background-color: #C3FF88;
border-color: #8DFF1C!important;
width:100%!important;
}

</style>
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
  <form name="ok" id="ok" method="post">
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
            		  <li class="active"><a href="usuario.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás </a></li>
        		  </ul>
        </div>
    </div>
    <div class="span9 well well-large" >
 			<p>
             <div class="span3 well well-small"><b>Nombre</b></div>
            <div class="span6 well well-small "><input type="text" name="nombre" id="nombre" maxlength="34" pattern="[A-Za-z,ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú, ]{1,34}" autofocus required/></div>
             <div class="span3 well well-small"><b>Apellido</b></div>
            <div class="span6 well well-small "><input type="text" name="apellido" id="apellido" maxlength="34" pattern="[A-Za-z,ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú, ]{1,34}" required/></div>
            <div class="span3 well well-small"><b>Dirección</b></div>
            <div class="span6 well well-small"><input type="text" name="direccion" id="direccion" maxlength="254" required/></div>
            <div class="span3 well well-small"><b>Nombre de Usuario</b></div>
            <div class="span6 well well-small"><input type="text" name="usuario" id="usuario" maxlength="34" pattern="[A-Z,Ñ]{1}[a-z,.,ñ,0-9]{1,33}" required/></div>
             <div class="span3 well well-small"><b>Contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena" id="contrasena" maxlength="34" required/>
           		<progress class=" progress progress-info progress-striped" value=0 max=100 id="barra"></progress>
           <div class="progress progress-info progress-striped"  style="width:80%" >
           <div class="bar" id="barrita" name="barrita" style="width:10%"></div>  
          
           </div>       
           
  
         		<input type="button" value="cargar" id="cargar" onclick="setInterval('cargar()',250)"/>

         </div>
         
             <div class="span3 well well-small"><b>Confirmar contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena_c" id="contrasena_c" maxlength="34" required/></div>
            <div class="span9 well well-small" align="center"><button class="btn btn-primary" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
			<div class="span9 well well-small" align="center"> <button class="btn btn-primary" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></div>

            </p>
  <form id="okk" name="okk">
         		<input id="myPassword" type="password" name="myPassword" value="">
			</form>
    </div>
    </div>
  
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<script src="../recursos/js/bootstrap.min.js"></script>
<script src="../recursos/js/strength.js"></script>
<script  src="../recursos/js/js.js"></script>
<script>
$(document).ready(function($) {
$('#myPassword').strength({

            strengthClass: 'strength',
            strengthMeterClass: 'strength_meter',
            strengthButtonClass: 'button_strength',
            strengthButtonText: 'Show Password',
            strengthButtonTextToggle: 'Hide Password'
        });	

});
</script>
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
