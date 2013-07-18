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
<div class="container">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;"> <a class="btn btn-navbar" href="#nav" data-toggle="collapse" data-target="#barrap"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a  class="brand" id="brand-admin" href="#">PANGEATECH</a>
        <div id="barrap" class="nav-collapse collapse">
          <ul class="nav slidernav">
            <li><a href="admin.php">Administrador</a></li>
            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="info.php">Información</a></li>
            <li><a href="producto.php"><em> <b>Producto </b> </em></a></li>
            <li><a href="sucursal.php">Sucursal</a></li>
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
             <li class="active"><a href="producto.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li> 
          </ul>
      </div>
    </div>
    <div class="span9">
      <div class="well well-large">
       <?php
        	$cons="SELECT * FROM producto WHERE productoid=".$_GET['id'];
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
                  <input id="nombre" name="nombre"  type="text" value="<?php echo $row['nombre']?>" contenteditable=true required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left"> Descripción </div>
              </dt>
              <dd>
                <div class="well well-small">
                <textarea id="redactor" name="redactor"><?php echo $row['descripcion']?></textarea>
                </div>
              </dd>
               <dt>
                <div class=" well well-small" align="left"> Enlace </div>
              </dt>
              <dd>
                <div class=" well well-small">
                  <input id="enlace" name="enlace"  type="text" value="<?php echo $row['enlace']?>" contenteditable=true required/>
                </div>
              </dd>
               <dt>
                <div class=" well well-small" align="left"> Imagen </div>
              </dt>
              <dd>
                <div class=" well well-small">
                            	<img width="200" height="100" src="<?php echo $row['imagen'];?> ">
			<input id="imagen" name="imagen" type="file" required/>
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
		
if(isset($_POST["guardar"])){
		$id=$_GET['id'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$enlace=$_POST['enlace'];
        $resultado=pg_query($conn,"UPDATE producto SET nombre='$nombre', descripcion='$descripcion' , enlace='$enlace' where productoid=$id") or die(pg_last_error($conn));
		if($resultado){
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
				$sql_update="update PRODUCTO set imagen='".$uploadfile."' where productoid=".$_GET['id'];
			
				$result= pg_query($conn, $sql_update);
																													
			}		
		 }
			
			
			
			
			llenarLog(2, "Producto");
javaalert("El producto fue modificado con éxito");
iraURL("producto.php");
		}
}
?>
</body>
</html>
