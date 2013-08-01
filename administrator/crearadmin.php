<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();

if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
}
	

if(isset($_POST["guardar"]) || isset($_POST["guardar2"])){

	if(isset($_POST["nombre"]) &&  isset($_POST["apellido"]) && isset($_POST["usuario1"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"]) && $_POST["nombre"]!="" && $_POST["apellido"]!="" && $_POST["usuario1"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!="" && $_POST["tipoadmin"]>0){
	
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$usuario=$_POST['usuario1'];
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
					llenarLog(1, "Administrador");
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
	}else{
		javaalert("Ingrese todos los campos");
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
              <li class="active"><a href="admin.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li>
          </ul>
      </div>
    </div>
    
    <div class="span9 well well-large">
        <p>
            <div class="span3 well well-small"><b>Nombre</b></div>
            <div class="span6 well well-small"><input id="nombre" name="nombre" type="text" placeholder="Ej. Niuska Jenireé" maxlength="34" pattern="[A-Za-z,ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú, ]{1,34}" required autofocus/></div>
            <div class="span3 well well-small"><b>Apellido</b></div>
            <div class="span6 well well-small"><input id="apellido" name="apellido" type="text" placeholder="Ej. Mora Hurtado"  maxlength="34" pattern="[A-Za-z,ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú, ]{1,34}" required/></div>
            <div class="span3 well well-small"><b>Usuario</b></div>
            <div class="span6 well well-small"><input id="usuario1" name="usuario1" type="text" placeholder="Ej. niuska.mora" maxlength="34" pattern="[a-z.ñ]{1,34}" required/>
            <div id="Info" style="float:right"></div>
            </div>
            <div class="span3 well well-small"><b>Contraseña</b></div>
            <div class="span6 well well-small"><input id="contrasena" name="contrasena" type="password" maxlength="34"  onkeyup="muestra_seguridad_clave(this.value, this.form)" pattern="[A-Za-z.0-9ñÑ]{6,34}" title="Debe agregar mínimo 6 letras, puntos o números" required/>
             <input id="fortaleza" name="fortaleza" type="text" size="10" style="border: 0px; text-decoration:italic;text-align:center;display:none" onfocus="blur()">
            <div id="contra" style="float:right"></div>
            </div>
            <div class="span3 well well-small"><b>Confirmar Contrseña</b></div>
            <div class="span6 well well-small"><input id="contrasena_c" name="contrasena_c" type="password" maxlength="34" pattern="[A-Za-z.0-9ñÑ]{1,34}" required/>
            <div id="contra1" style="float:right"></div>
            </div>
			<div class="span3 well well-small"><b>Tipo de Administrador</b></div>
            <div class="span6 well well-small">
            <select id="tipoadmin" name="tipoadmin">
                    	<option value="0">Seleccione Opción</option>
                        <?php
		
						$SQL="SELECT * FROM tipoadministrador";
						$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						
						while($row=pg_fetch_array($result)){
							echo '<option value="'.$row['tipoadministradorid'].'">'.$row['nombre'].'</option>';

							}

						?>
                    </select>
                    </div>
      <div class="span9 well well-small" align="center">
      <button name="guardar" id="guardar" type="submit" class="btn btn-primary text-center">Guardar</button>
      </div>
      
      <div class="span9 well well-small" align="center">
      <button id="guardar2" name="guardar2" class="btn btn-primary text-center" type="submit">Guardar y añadir otro</button>
      </div>
                
         </p>
    </div>
  </div>
</div>

<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
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
   $('#usuario1').blur(function(){
        if($(this).val()!=""){
			$('#Info').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);

		}

        var usuario1 = $(this).val();        
        var dataString = 'usuario1='+usuario1;

        $.ajax({
            type: "POST",
            url: "chequear_admin.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });
	
	<!-- Codigo para verificar las contraseñas --> 
   $('#contrasena_c').blur(function(){
	   document.getElementById('fortaleza').style.display='none';
	   
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
		document.getElementById('fortaleza').style.display='none';
		
        if($(this).val()!="" && document.forms.formulario.contrasena_c.value!=""){
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
<script src="../recursos/js/bootstrap.js"></script> 

</form>
</body>
</html>
