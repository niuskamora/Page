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
             <li class="active"><a href="info.php"> <span class="add-on"><i class="icon-arrow-left"></i></span> Atrás</a></li>          
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
	
      <form enctype="multipart/form-data" method="post">
          <div class="row-fluid">
            <dl class="dl-horizontal">
              <dt>
                <div class=" well well-small" align="left">Título</div>
              </dt>
              <dd>
                <div class=" well well-small">
                  <input id="titulo" name="titulo" type="text" value="<?php echo $row['titulo']; ?>" contenteditable="true"  maxlength="249" pattern="[A-Za-z,ñ,Ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú, 0-9]{1,249}" required/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Descripción</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <textarea id="redactor" name="redactor" contenteditable="true"  maxlength="2499"><?php echo $row['descripcion']; ?></textarea>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Enlace</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <input id="enlace" name="enlace" type="text" value="<?php echo $row['enlace']; ?>" contenteditable="true"  maxlength="249"/>
                </div>
              </dd>
              <dt>
                <div class=" well well-small" align="left">Imagen</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <img src="<?php echo "../".$row['imagen'];?> ">
                	<input id="imagen" name="imagen" type="file" contenteditable="true"/>
                	</br>
                    <h5>Seleccione el tamaño</h5>
                    50x50
                    <input name="op" id="op" type="radio" value="1" checked />
                    320x240
                    <input name="op" id="op" type="radio" value="2"/>
                    640x480
                    <input name="op" id="op" type="radio" value="3"/>
                </div>
              </dd>
              <dd>
              <dt>
                <div class=" well well-small" align="left">Tipo Información</div>
              </dt>
              <dd>
                <div class="well well-small">
                  <select id="tipoinfo" name="tipoinfo" contenteditable="true">
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
                    </select>
                </div>
              </dd>
                <div class="well well-small" align="center">
                  <button id="guardar" name="guardar" class="btn btn-primary text-center" type="submit">Modificar</button>
                </div>
            </dl>
          </div>
        </form>
    
        <?php }?>
<?php

if(isset($_POST["guardar"])){
	
	if(isset($_POST["titulo"]) && isset($_POST["redactor"]) && $_POST["titulo"]!="" && $_POST["redactor"]!="" && $_POST["tipoinfo"]>0){
	
		$titulo=$_POST['titulo'];
		$descripcion=$_POST['redactor'];
		$enlace=$_POST['enlace'];
		$tipoinfo=$_POST['tipoinfo'];
	
		if(isset($_POST["op"])){
		
			if($_POST["op"]==1){
				$an=50;
				$al=50;
			}
			if($_POST["op"]==2){
				$an=320;
				$al=240;
			}
			if($_POST["op"]==3){
				$an=640;
				$al=480;
			}
		}
	
		$resultado=pg_query($conn,"UPDATE informacion SET titulo='$titulo', descripcion='$descripcion', enlace='$enlace', tipoinformacionid='$tipoinfo' WHERE informacionid=$id") or die(pg_last_error($conn));
	
		if($_FILES['imagen']['name']!=""){
		
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
			$numerodeletras=10; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++){
    			$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
			}
		
			$direccion="../recursos";
			$direccion2="recursos";
			$tipo = explode('/',$_FILES['imagen']['type']);
			$uploadfile =$direccion."/img/".$id.".".$tipo[1];
			$uploadfile2 =$direccion2."/img/".$id.".".$tipo[1];
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
			
			    if($ancho!=$an){
				   $ancho_buscado3=$an;
				   $alto_buscado3=ceil(($an*$alto)/$ancho);					
				}
			
				if($alto<=$ancho){
				   $alto_buscado3=$al;
				   $ancho_buscado3=ceil(($al*$ancho)/$alto);
				}else{
				   $ancho_buscado3=$an;
				   $alto_buscado3=ceil(($an*$alto)/$ancho);
				}	

                if($alto_buscado3<$an){
				   $ancho_buscado3=ceil(($an*$ancho_buscado3)/$alto_buscado3);
				   $alto_buscado3=$an;
				}

				if($ancho_buscado3<$al){
				   $alto_buscado3=ceil(($al*$alto_buscado3)/$ancho_buscado3);
				   $ancho_buscado3=$al;	
				}
				
                $tmp=imagecreatetruecolor($ancho_buscado3,$alto_buscado3);
				imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_buscado3, $alto_buscado3,$ancho,$alto);
				//Definimos la calidad de la imagen final
				$calidad=100;
				//Se crea la imagen final en el directorio indicado
				imagejpeg($tmp,$uploadfile,$calidad);				
										
				$fichero=$uploadfile;			
				$img1 = imagecreatefromjpeg($fichero);
				$img1Recortada = imagecreatetruecolor ($an, $al);
				imagecopy($img1Recortada, $img1, 0, 0, ceil(($ancho_buscado3-$an)/2), ceil(($alto_buscado3-$al)/2), ceil(($ancho_buscado3-$an)/2)+$an, ceil(($alto_buscado3-$al)/2)+$al);
				
				imagejpeg($img1Recortada,$uploadfile,$calidad);				
				$sql_update="update informacion set imagen='".$uploadfile2."' where informacionid=$id";
			
				$result= pg_query($conn, $sql_update);
																													
			}
		 }
		 if($result){
			 	javaalert("Modifico");
			 }
	
		if($resultado || $result){
			javaalert('Se Modifico la Información');
			llenarLog(2, "Información");
			iraURL('../administrator/info.php');	
		}
	}else{
		javaalert("Ingrese todos los campos");
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