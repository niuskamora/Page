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
<!-- Importanto plantilla del Redactor -->
	<link rel="stylesheet" href="../recursos/redactor/redactor.css" />
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="#">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav slidernav">
            <li><a href="admin.php">Administrador</a></li>
            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php"> Información  </a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php"><em> <b>Sucursal </b> </em></a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
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
             <li class="active"><a href="sucursal.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li>          
          </ul>
      </div>
    </div>
           <form enctype="multipart/form-data"  method="POST">
    <div class="span9 well well-large">
        <p>
 

        
        <?php
        	$cons="SELECT * FROM sucursal WHERE sucursalid=$id";
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			if($row=pg_fetch_array($resulta)){
		?>

            <div class="span3 well well-small"><b>nombre</b></div>
            <div class="span6 well well-small"><input id="nombre" name="nombre" type="text" value="<?php echo $row['nombre'];?>" required/></div>
            <div class="span3 well well-small"><b>Dirección</b></div>
            <div class="span6 well well-small" align="justify"><input id="direccion" name="direccion" type="text" value="<?php echo $row['direccion'];?>" required/></div>
            <div class="span3 well well-small"><b>Telefono</b></div>
            <div class="span6 well well-small"><input title="telefono"  pattern="[0-9]{11}" id="telefono" name="telefono" type="tel" placeholder="Ej. 02761234567" maxlength="11" value="<?php echo $row['telefono'];?>" required/></div>
            <div class="span3 well well-small"><b>Correo</b></div>
            <div class="span6 well well-small"><input id="correo" placeholder="ejemplo@correo.com" name="correo" type="email" value="<?php echo $row['correo'];?>" required/></div>
            <div class="span3 well well-small"><b>Imagen</b></div>
            <div class="span6 well well-small"><img src="<?php echo $row['imagen'];?>"><input id="imagen" name="imagen" type="file" required/></div>
           <div class="span3 well well-small"><b>Latitud</b></div>
            	<div class="span6 well well-small"><input id="latitud" name="latitud" type="text" placeholder="+38.234534" pattern="[+,-][0-9]{1,3}[.][0-9]{6}"  value="<?php echo $row['latitud'];?>" required/></div>
                <div class="span3 well well-small"><b>Longitud</b></div>
            	<div class="span6 well well-small"><input id="longitud" name="longitud" type="text" placeholder="-12.234534" value="<?php echo $row['longitud'];?>" pattern="[+,-][0-9]{1,3}[.][0-9]{6}" required/></div>
                <div class="span3 well well-small"><b>Descripción</b></div>
            	<div align="justify" class="span6 well well-small"><textarea id="redactor" name="redactor"  required><?php echo $row['descripcion'];?></textarea> </div>
                
     <?php }?>

               <div align="center" class="span12 well well-small"> 
                	<button id="guardar" name="guardar" class="btn btn-primary text-center" type="submit">Modificar</button></div>
                
   		</div>
    
    <?php
	if(isset($_POST["guardar"])){
	
	$nombres=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$descripcion=$_POST['redactor'];
	$latitud=$_POST['latitud'];
	$longitud=$_POST['longitud'];
	

	
	$resultado=pg_query($conn,"UPDATE sucursal SET  nombre='$nombres',direccion='$direccion',telefono='$telefono',correo='$correo',latitud='$latitud',longitud='$longitud',descripcion='$descripcion' where sucursalid=$id") or die(pg_last_error($conn));
	$arreglo=$id;
	
	if($_FILES['imagen']['name']!=""){
		
		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
		$numerodeletras=10; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++){
    		$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
		}
		
		$direccion="../recursos";
		$tipo = explode('/',$_FILES['imagen']['type']);
		$uploadfile =$direccion."/img/".$arreglo.".".$tipo[1];
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
				$sql_update="update sucursal set imagen='".$uploadfile."' WHERE sucursalid=".$arreglo."";
			
				$result= pg_query($conn, $sql_update);
																													
			}		
		 }
	
	if($resultado){
			llenarLog(1, "edito sucursal");
			iraURL('../administrator/sucursal.php');
	}
}
	?>
	


<!-- Le javascript
================================================== --> 
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script> 
<script src="../recursos/js/bootstrap.min.js"></script>
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
</body>
</html>