<?php
session_start();

include("../recursos/funciones.php");
$conn=conectar();
if(!isset($_GET["id"])){
	iraURL('usuario.php');
	}
if(!isset($_SESSION["usuarioadmin"]) || !isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/index.php');
	}
			
if(isset($_POST["guardar"])){
		if(isset($_POST["nombre"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"]) && isset($_POST["contrasena_c"]) && $_POST["nombre"]!=""  && $_POST["usuario"]!="" && $_POST["contrasena"]!="" && $_POST["contrasena_c"]!=""){
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
             <li class="active"><a href="usuario.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li> 
          </ul>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
       <?php
        	$cons="SELECT * FROM usuario WHERE usuarioid=".$_GET['id'];
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			$registros= pg_num_rows($resulta);
						if($registros!=1){
							iraURL("usuario.php");
							}
			$row=pg_fetch_array($resulta);
		?>
     <form id="formulario" method="post">
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
<input type="text" name="apellido" id="apellido" value="<?php echo $row['apellido']?>" maxlength="34" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,34}" />
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left">Dirección</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="text" name="direccion" id="direccion" value="<?php echo $row['direccion']?>" maxlength="254" />
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Nombre de Usuario</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="text" name="usuario" id="usuario" value="<?php echo $row['usuario']?>" maxlength="34" pattern="[A-ZÑ]{1}[a-z.ñ0-9]{1,33}" required/>
                <div id="Info" style="float:right"></div>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Contraseña </div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="password" name="contrasena" id="contrasena" value="<?php echo $row['contrasena']?>" maxlength="34" onkeyup="muestra_seguridad_clave(this.value, this.form)" pattern="[A-Za-z.0-9ñÑ]{1,34}" required/>
<input id="fortaleza" name="fortaleza" type="text" size="10" style="border: 0px; text-decoration:italic;text-align:center;display:none;" onfocus="blur()">
            <div id="contra" style="float:right"></div>
                </div>
              </dd>
                </dd>
              <dt>
                <div class=" well well-small" align="left"> Confirmar ontraseña</div>
              </dt>
              <dd>
                <div class="well well-small">
<input type="password" name="contrasena_c" id="contrasena_c" value="<?php echo $row['contrasena']?>" maxlength="34" pattern="[A-Za-z.0-9ñÑ]{1,34}" required/>
                            <div id="contra1" style="float:right"></div>
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
   $('#usuario').blur(function(){
	   if($(this).val()!=""){
		           $('#Info').html('<img src="../recursos/img/loader.gif" alt="" />').fadeOut(1000);
		   }
		   var usuarioo = $(this).val();        
        var dataString = 'usuarioo='+usuarioo;
        $.ajax({
            type: "POST",
            url: "chequear_usuario_editar.php?id_usuario=<?php echo $_GET['id'];?>",
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

</body>
</html>