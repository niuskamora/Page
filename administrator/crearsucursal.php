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
            <li><a href="usuario">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php">Producto</a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="tipoinfo.php">Tipo Infomación</a></li>
            <li><a href="tipoadmin.php"> <em> <b> Tipo Administracion </b> </em>  </a></li>
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
        
         <div class="btn-group btn-group-vertical">
             
             <button class="btn btn-primary dropdown-menu btn-large text-left " onClick="location.href='tipoadmin.php'"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</button>
        
        </div>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
        <p>
        
			<form enctype="multipart/form-data"  method="POST">
        	<table width="100%" class="table table-bordered">
            	<tr>
                	<th>Nombre</th>
                    <td><input title="Se necesita un nombre" id="nombres" name="nombres" type="text" value="" required/></td>
                </tr>
                <tr>
                	<th>Dirección</th>
             <td><input id="direccion" name="direccion" type="text" value="" required/></td>
                </tr>
                <tr>
                	<th>telefono</th>
                    <td><input title="telefono"  pattern="[0-9]{11}" id="telefono" name="telefono" type="tel" placeholder="Ej. 02761234567" maxlength="11" value="" required/></td>
                </tr>
                <tr>
                	<th>correo</th>
             <td><input id="correo" placeholder="ejemplo@correo.com" name="correo" type="email" value="" required/></td>
                </tr>
                 <tr>
                	<th>Imagen</th>
             <td><input id="imagen" name="imagen" type="file"/> </td>
                </tr>
                 <tr>
                	<th>Descripcion</th>
             <td><input id="descripcion" name="descripcion" type="text" value="" required/></td>
                </tr>
                <tr>
                
                <tr>
                	<th>latitud</th>
             <td><input id="latitud" name="latitud" type="text" placeholder="+38.234534" pattern="[+,-][0-9]{1,3}[.][0-9]{6}"  value="" required/></td>
                </tr>
                 <tr>
                	<th>longitud</th>
             <td><input id="longitud" name="longitud" type="text" placeholder="-12.234534" value="" pattern="[+,-][0-9]{1,3}[.][0-9]{6}" required/></td>
                </tr>
                <tr>
                
                	<td> </td> <td><button id="guardar" name="guardar" class="btn-primary text-center" type="submit">Guardar</button></td>
                </tr>
                <td> </td> <td><button id="guardar2" name="guardar2" class="btn-primary text-center" type="submit">Guardar y añadir otro</button></td>
            </table>
            
            
        </form>
		<?php
		

if(isset($_POST["guardar2"])){
	
	$nombre=$_POST['nombres'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$descripcion=$_POST['descripcion'];
	$latitud=$_POST['latitud'];
	$longitud=$_POST['longitud'];
	
	$sql1="SELECT menuid FROM menu WHERE nombre='sucursal'";
	$result1=pg_query($conn, $sql1);
	$arregl1=pg_fetch_array($result1);
	$menuid=$arregl1["menuid"];
	
	$resultado=pg_query($conn,"INSERT INTO sucursal values( nextval('sucursal_sucursalid_seq'),'$nombre','$direccion','$telefono','$correo','','$menuid','$latitud','$longitud','$descripcion')") or die(pg_last_error($conn));
	
	$sql_select="SELECT last_value FROM sucursal_sucursalid_seq;";
	$results=pg_query($conn, $sql_select);
	$arreglo=pg_fetch_array($results,0);
	
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
		$uploadfile =$direccion."/img/".$arreglo[0].".".$tipo[1];
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
				$sql_update="update sucursal set imagen='".$uploadfile."' WHERE sucursalid=".$arreglo[0]."";
			
				$result= pg_query($conn, $sql_update);
																													
			}		
		 }
	
	if($resultado && $result){
			llenarLog(1, "Creo sucursal");
			iraURL('../administrator/sucursal.php');
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