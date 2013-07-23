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
	<!-- Importanto plantilla del Redactor -->
	<link rel="stylesheet" href="../recursos/redactor/redactor.css" />
	
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
		<form enctype="multipart/form-data"  method="POST">

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
              <li class="active"><a href="producto.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás </a></li>
          </ul>
      </div>
    </div>
     <div class="span9 well well-large" >
 			<p>
        <div class="span3 well well-small"><b>Nombre</b></div>
            <div class="span6 well well-small "><input type="text" name="nombre" id="nombre" maxlength="249" title="Ingrese el nombre" placeholder="Ej. Sistema de Comercialización" autofocus required/></div>
            <div class="span3 well well-small"><b>Descripción</b></div>
            <div class="span6 well well-small"><textarea id="redactor" name="redactor" maxlength="2499" required></textarea></div>
             <div class="span3 well well-small"><b>Enlace</b></div>
            <div class="span6 well well-small"><input type="text" name="enlace" id="enlace" maxlength="249" title="Ingrese el enlace" placeholder="Ej. http:/..."  required/></div>
             <div class="span3 well well-small"><b>Imagen</b></div>
            <div class="span6 well well-small"><input id="imagen" name="imagen" type="file" maxlength="249" required/></div>
            <div class="span9 well well-small" align="center"><button class="btn btn-primary" id="crear_uno" name="crear_uno" type="submit">Guardar</button></div>
			<div class="span9 well well-small" align="center"> <button class="btn btn-primary" id="crear_otro" name="crear_otro" type="submit">Guardar y añadir otro</button></div>

            </p>
    </div>
    
    
    </div>

  
</div>
<!-- Javascript
================================================== --> 

<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 

<!--Jquery para el Redactor
================================================== --> 
<script src="../recursos/redactor/redactor.js"></script>
	<script src="../recursos/redactor/redactor.min.js"></script>
	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor').redactor();
		}
	);
	</script>
<?php 
	//codigo para guardar 
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){

	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["redactor"]) && $_POST["redactor"]!="" && isset($_POST["enlace"]) && $_POST["enlace"]!="" ){		
				$insertar = "insert into producto values(nextval('producto_productoid_seq'),'".$_POST['nombre']."','".$_POST['redactor']."','".$_POST['enlace']."','');";
				$conex=conectar();
				pg_query($conex,$insertar) or die (pg_last_error($conex));
				$sql_select="SELECT last_value FROM producto_productoid_seq;";
				$results=pg_query($conn, $sql_select);
				$arreglo=pg_fetch_array($results,0);
				
				if($_FILES['imagen']['name']!=""){
					
					$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
					$numerodeletras=5; //numero de letras para generar el texto
					$cadena = ""; //variable para almacenar la cadena generada
					for($i=0;$i<$numerodeletras;$i++){
						$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
						entre el rango 0 a Numero de letras que tiene la cadena */
					}
					
					$direccion="../recursos"; //para cargar
					$direccion2="recursos";//para guardar
					$tipo = explode('/',$_FILES['imagen']['type']);
					$uploadfile =$direccion."/img/producto/".$cadena.".".$tipo[1];
					$uploadfile2 =$direccion2."/img/producto/".$cadena.".".$tipo[1];
					$error = $_FILES['imagen']['error']; 
					$subido = false;
					
					
					if($error==UPLOAD_ERR_OK){ 
							$subido = copy($_FILES['imagen']['tmp_name'], $uploadfile); 
							$rutaImagenOriginal=$uploadfile;
							if($tipo[1]=="jpg" || $tipo[1]=="JPEG" || $tipo[1]=="JPG" || $tipo[1]=="jpeg"){
								$img_original = imagecreatefromjpeg($rutaImagenOriginal);
							}
							if($tipo[1]=="png"){
								$img_original = imagecreatefrompng($rutaImagenOriginal);
							}
			
							list($ancho,$alto)=getimagesize($rutaImagenOriginal);
							$ancho_buscado3=0;
							$alto_buscado3=0;	
						
							if($ancho!=640){
							   $ancho_buscado3=640;
							   $alto_buscado3=ceil((640*$alto)/$ancho);					
							}
						
							if($alto<=$ancho){
							   $alto_buscado3=480;
							   $ancho_buscado3=ceil((480*$ancho)/$alto);
							}else{
							   $ancho_buscado3=640;
							   $alto_buscado3=ceil((640*$alto)/$ancho);
							}	
			
							if($alto_buscado3<480){
							   $ancho_buscado3=ceil((480*$ancho_buscado3)/$alto_buscado3);
							   $alto_buscado3=480;
							}
			
							if($ancho_buscado3<640){
							   $alto_buscado3=ceil((640*$alto_buscado3)/$ancho_buscado3);
							   $ancho_buscado3=640;	
							}
							
							$tmp=imagecreatetruecolor($ancho_buscado3,$alto_buscado3);
							imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_buscado3, $alto_buscado3,$ancho,$alto);
							//Definimos la calidad de la imagen final
							$calidad=100;
							//Se crea la imagen final en el directorio indicado
							imagejpeg($tmp,$uploadfile,$calidad);				
													
							$fichero=$uploadfile;			
							$img1 = imagecreatefromjpeg($fichero);
							$img1Recortada = imagecreatetruecolor (640, 480);
							imagecopy($img1Recortada, $img1, 0, 0, ceil(($ancho_buscado3-640)/2), ceil(($alto_buscado3-640)/2), ceil(($ancho_buscado3-640)/2)+640, ceil(($alto_buscado3-480)/2)+480);
							
							imagejpeg($img1Recortada,$uploadfile,$calidad);				
							$sql_update="update PRODUCTO set imagen='".$uploadfile2."' where productoid=".$arreglo[0]."";
						
							$result= pg_query($conn, $sql_update);
																																
						}		
					 }
				
			
						llenarLog(1,"PRODUCTO");
						if(isset($_POST["crear_uno"])){
						iraURL('../administrator/producto.php');		
						}else{
						iraURL('../administrator/crearproducto.php');	
							}	
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}		
	}

	?>
    		</form >

</body>
</html>
