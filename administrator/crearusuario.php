<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();
if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
	}

	//codigo para guardar
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){

	if(isset($_POST["nombre"])  && isset($_POST["usuarioo"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"])  && $_POST["usuarioo"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!=""){
		$SQL="SELECT * FROM usuario where usuario='".$_POST["usuarioo"]."'";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		if($registros == 0){
				if($_POST["contrasena"]==$_POST["contrasena_c"]){
						$insertar = "insert into usuario values(nextval('usuario_usuarioid_seq'),'".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['direccion']."','".$_POST['usuarioo']."','".$_POST['contrasena']."',".$_SESSION["id_usuario"].");";
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
				javaalert("Debe agregar el nombre , el usuario y la contraseña obligatoriamente, por favor verifique");
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
<link href="../recursos/css/estilo_nombre_usuario.css" rel="stylesheet">
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
  <form id="formulario" method="post">
<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="principal.php">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav">
            <li class="dropdown active"> <a  class="dropdown-toggle" data-target="#" data-toggle="dropdown"> Gestión Usuarios <b class="caret"></b> </a>
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
              Gestión Información <b class="caret"></b> </a>
              <ul class="dropdown-menu">
                <li><a href="tipoinfo.php">Tipo Infomación</a></li>
                <li><a href="info.php">Información</a></li>
              </ul>
            </li>
              <?php if(supera($_SESSION["admin"])){
            ?><li><a href="bitacora.php"> Bitácora</a></li>
           <?php }?>
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
            <div class="span6 well well-small "><input type="text" name="nombre" id="nombre"  maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ0-9,. ]{1,34}" title="Puede agregar solo letras,números puntos y comas" placeholder="Ej. Luz Mariela" autofocus required/></div>
            <div class="span3 well well-small"><b>Apellido</b></div>
            <div class="span6 well well-small "><input type="text" name="apellido" id="apellido" maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" title="Ingrese el apellido" placeholder="Ej. Suarez Hernandez" /></div>
            <div class="span3 well well-small"><b>Dirección</b></div>
            <div class="span6 well well-small"><input type="text" name="direccion" id="direccion" maxlength="254" placeholder="Ej. Carrera 10 # 8-5" title="Ingrese la dirección" /></div>
            <div class="span3 well well-small"><b>Nombre de Usuario</b></div>
            <div class="span6 well well-small"  ><input type="text" name="usuarioo" id="usuarioo" placeholder="Ej. Mariela.arboleda2541" title="El formato es Mayúscula(letras, puntos o números)" maxlength="34" pattern="[A-ZÑ]{1}[a-z.ñ0-9]{1,33}"  required/>
             <div id="Info" style="float:right"></div>
             </div>
            <div class="span3 well well-small"><b>Contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena" id="contrasena" maxlength="34" onkeyup="muestra_seguridad_clave(this.value, this.form)" pattern="[A-Za-z.0-9ñÑ]{6,34}" title="Debe agregar mínimo 6 letras, puntos o números" required/>
           <input id="fortaleza" name="fortaleza" type="text" size="10" style="border: 0px; text-decoration:italic;text-align:center;display:none" onfocus="blur()">
            <div id="contra" style="float:right"></div>
            </div>
            <div class="span3 well well-small"><b>Confirmar contraseña</b></div>
            <div class="span6 well well-small"><input type="password" name="contrasena_c" id="contrasena_c" maxlength="34" pattern="[A-Za-z.0-9ñÑ]{6,34}" title="Debe repetir la contraseña" required/>
             <div id="contra1" style="float:right"></div>
            </div>
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
<script type="text/javascript">
$(document).ready(function() {
 
$('.dropdown-toggle').click(function(e) {
  e.preventDefault();
  setTimeout($.proxy(function() {
    if ('ontouchstart' in document.documentElement) {
      $(this).siblings('.dropdown-backdrop').off().remove();
    }
  }, this), 0);
});
 <!-- Codigo para verificar si el nombre de usuario ya existe --> 
   $('#usuarioo').blur(function(){
	   if($(this).val()!=""){
		           $('#Info').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);

		   }
        var usuarioo = $(this).val();        
        var dataString = 'usuarioo='+usuarioo;
        $.ajax({
            type: "POST",
            url: "chequear_usuario.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });      

<!-- Codigo para verificar las contraseñas --> 
   $('#contrasena_c').blur(function(){
        if($(this).val()!=""){
			$('#contra').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena_c = $(this).val();        
        var dataString = 'contrasena_c='+contrasena_c;
		var con= document.forms.formulario.contrasena.value;

        $.ajax({
            type: "POST",
           	url: "chequear_contrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });
	
	$('#contrasena').blur(function(){
        if($(this).val()!=""){
			$('#contra').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);
			$('#contra1').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);

		}

        var contrasena = $(this).val();        
        var dataString = 'contrasena='+contrasena;
		var con= document.forms.formulario.contrasena_c.value;
		
        $.ajax({
            type: "POST",
            url: "chequear_contrasena.php?contra="+con+"",
            data: dataString,
            success: function(data) {
                $('#contra').fadeIn(1000).html(data);
				$('#contra1').fadeIn(1000).html(data);
            }
        });
    });  
 
});

 <!-- Codigo para verificar la fortaleza de la contraseña --> 

var numeros="0123456789";
var letras="abcdefghyjklmnñopqrstuvwxyz";
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function seguridad_clave(clave){
	var seguridad = 0;
	if (clave.length!=0){
		if (tiene_numeros(clave) && tiene_letras(clave)){
			seguridad += 30;
		}
		if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
			seguridad += 30;
		}
		if (clave.length >= 4 && clave.length <= 5){
			seguridad += 10;
		}else{
			if (clave.length >= 6 && clave.length <= 8){
				seguridad += 30;
			}else{
				if (clave.length > 8){
					seguridad += 40;
				}
			}
		}
	}
	return seguridad				
}	

function muestra_seguridad_clave(clave,formulario){
	seguridad=seguridad_clave(clave);
	document.getElementById('fortaleza').style.color='#FFFFFF'; 
	if(seguridad>0 && seguridad<=40){
		 document.getElementById('fortaleza').style.display='block'; 
		document.getElementById('fortaleza').style.backgroundColor="#2ECCFA"; 
		formulario.fortaleza.value="Debil";
		}else if(seguridad>40 && seguridad<=70){
			formulario.fortaleza.value="Medio";
			document.getElementById('fortaleza').style.backgroundColor="#5882FA"; 
		}else if(seguridad>70){
			formulario.fortaleza.value="Fuerte";
				document.getElementById('fortaleza').style.backgroundColor="#0404B4"; 
		}else{
				document.getElementById('fortaleza').style.display='none'; 
			}		
}
</script>  
     </form>
     
</body>
</html>
