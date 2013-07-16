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
            <li><a href="info.php"> <em> <b>Información </b> </em> </a></li>
            <li><a href="producto.php">Producto</a></li>
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
             <li class="active"><a href="info.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atras</a></li>          
          </ul>
      </div>
    </div>
    
    <div class="span9">
      <div class="well well-large">
        <p>
        
        <?php
        	$cons="SELECT * FROM informacion WHERE informacionid=$id";
			$resulta = pg_query ($conn, $cons) or die("Error en la consulta SQL");
			
			if($row=pg_fetch_array($resulta)){
		?>
        
		<form enctype="multipart/form-data"  method="POST">
        
        	<table width="100%" class="table table-bordered">
            	<tr>
                	<th>Título</th>
                    <td><input id="titulo" name="titulo" type="text" value="<?php echo $row['titulo']; ?>" required/></td>
                </tr>
                <tr>
                	<th>Descripción</th>
                    <td><textarea id="redactor" name="redactor"><?php echo $row['descripcion']; ?></textarea></td>
                </tr>
                <tr>
                	<th>Enlace</th>
                    <td><input id="enlace" name="enlace" type="text" value="<?php echo $row['enlace']; ?>" required/></td>
                </tr>
                 <tr>
                	<th>Imagen</th>
                    <td><img width="200" height="100" src="<?php echo $row['imagen'];?> ">
                    <input id="imagen" name="imagen" type="file"/> </td>
                </tr>
                <tr>
                	<th>Menú</th>
                    <td><select id="menu" name="menu">
                    <?php 
						
						$consu="SELECT * FROM menu WHERE menuid=".$row['menuid'];
						$resulta1 = pg_query ($conn, $consu) or die("Error en la consulta SQL");
						if($row1=pg_fetch_array($resulta1)){
							echo '<option value="'.$row1['menuid'].'">'.$row1['nombre'].'</option>';
                        
                        }
						?>
                    	<option value="0">Seleccione Opción</option>
                        <?php
		
						$SQL="SELECT * FROM menu";
						$resulta2 = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						
						while($row2=pg_fetch_array($resulta2)){
							echo '<option value="'.$row2['menuid'].'">'.$row2['nombre'].'</option>';

							}

						?>
                    </select></td>
                </tr>
                
                <tr>
                	<th>Tipo Información</th>
                    <td><select id="tipoinfo" name="tipoinfo">
                    <?php 
						
						$consu1="SELECT * FROM tipoinformacion WHERE tipoinformacionid=".$row['tipoinformacionid'];
						$resulta3 = pg_query ($conn, $consu1) or die("Error en la consulta SQL");
						if($row3=pg_fetch_array($resulta3)){
							echo '<option value="'.$row3['tipoinformacionid'].'">'.$row3['nombre'].'</option>';
                        
                        }
						?>
                    	<option value="0">Seleccione Opción</option>
                        <?php
		
						$SQL="SELECT * FROM tipoinformacion";
						$resulta4= pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						
						while($row4=pg_fetch_array($resulta4)){
							echo '<option value="'.$row4['tipoinformacionid'].'">'.$row4['nombre'].'</option>';

							}

						?>
                    </select></td>
                </tr>
                
                <tr>
                	<td> </td> <td><button name="guardar" id="guardar" type="submit" class="btn-primary text-center">Modificar</button></td>
                </tr>
                
            </table>
        </form>
     <?php }?>
<?php

if(isset($_POST["guardar"])){
	
	if(isset($_POST["redactor"]) && $_POST["redactor"]!="" ){
	
		$titulo=$_POST['titulo'];
		$descripcion=$_POST['redactor'];
		$enlace=$_POST['enlace'];
		$menu=$_POST['menu'];
		$tipoinfo=$_POST['tipoinfo'];
	
		$resultado=pg_query($conn,"UPDATE informacion SET titulo='$titulo', descripcion='$descripcion', enlace='$enlace', menuid='$menu', tipoinformacionid='$tipoinfo' WHERE informacionid=$id") or die(pg_last_error($conn));
	
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
			$uploadfile =$direccion."/img/".$id.".".$tipo[1];
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
				$sql_update="update informacion set imagen='".$uploadfile."' where informacionid=$id";
			
				$result= pg_query($conn, $sql_update);
																													
			}		
		 }
	
		if($resultado && $result){
			javaalert('Se Modifico la Información');
			llenarLog(2, "Modifico Información");
			iraURL('../administrator/info.php');	
		}
	}
}
?>
         </p>
      </div>
    </div>
    </div>
  </div>
</div>

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