<?php
session_start();

include("recursos/funciones.php");
$conn=conectar();
?>
<!DOCTYPE html>

<head>
<title>:: Pangea Technologies ::</title>
<meta name="description" content="Pagina Web"/>
<meta name="author" content="Pangea Technologies"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="utf-8" />
<link rel=StyleSheet href="recursos/css/bootstrap.min.css" type="text/css" />
<link rel=StyleSheet href="recursos/animate/animate.css" type="text/css" />
<link rel=StyleSheet href="recursos/css/estilogeneral.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="recursos/circular/css/jquery.jscrollpane.css" media="all" />
<link rel="stylesheet" type="text/css" href="recursos/circular/css/style.css" media="all" />
<style></style>
<link rel=StyleSheet href="recursos/css/bootstrap-responsive.min.css" type="text/css" />
<link rel=StyleSheet href="recursos/slide/jquery.pageslide.css" type="text/css" />
<head>
<body  id="myStyle" data-spy="scroll" data-target="#website-nav" data-offset="0">
<script type="text/javascript" src="recursos/js/jquery-2.0.2.js" ></script> 
<script type="text/javascript" src="recursos/js/bootstrap.min.js" ></script> 
<script type="text/javascript" src="recursos/slide/jquery.pageslide.min.js" ></script> 
<a href="#" class="scrolltop" style="display: none;"> <span>up</span> </a>
<div  class="container-fluid" style="background-image: url('recursos/img/back.jpg'); background-repeat: repeat;">
<div id="fullp">
<div class="container" style="background-color:white;">
  <div class="row-fluid">
    <div class="span12"> 
      
      <!--Nav bar content-->
      <div  class="row-fluid headerg hidden-desktop">
        <div class="headera" style="text-align: left;" > <img  src="recursos/img/izquierdasuperior.png" style="margin-bottom: 3px;" /> </div>
        <div  class="headerb" style="text-align: center;"> <img  src="recursos/img/logo.png" style="margin-bottom: 3px;" height="160" /> </div>
        <div class="headerc"  style="text-align: right;"> <img  src="recursos/img/derechainferior.png" style="margin-bottom: 3px; text-align: left;" /> </div>
      </div>
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container"><a id="open" href="#nav" class="btn btn-navbar" data-toggle="collapse" data-target="#barrac"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a id="open2" href="#" class="btn btn-navbar" data-toggle="collapse" data-target="#login"><i class="icon-user icon-white"></i></a> <a class="brand visible-desktop" style="float:left" href="#"><img  src="recursos/img/logop.png" width="140" height="20"/></a>
            <div id="barrac" class="nav-collapse collapse">
              <ul id="nav" class="nav slidernav">
                <?php   menu_principal(0,"home"); ?>
              </ul>
            </div>
            <!--/.nav-collapse -->
            <div id="login" class="nav-collapse collapse">
              <ul id="log" class="nav pull-right">
                <li class="divider-vertical"></li>
                <li><a href="/users/sign_up">Iniciar sesion</a></li>
              </ul>
            </div>
            <!--/.nav-collapse --> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" style="background-color:white;">
  <div class=" row-fluid span12">
    <div class="span2">
      <aside class="span2 well affix" data-spy="affix">
        <nav id="website-nav" class="sidebar-nav">
          <ul id="website-nav" class="nav nav-list">
            <?php $SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$m=0;
	if($registros != 0){
		?>
            <div class="accordion" id="accordion2">
            <?php
			for ($i=0;$i<$registros;$i++)
			{
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']=="Servicios"){
					?>
            <br>
            <li class="nav-header">Pangeatech</li>
            <li class=""><a href="#in">Pangeatech</a></li>
            <?php
							}else{
							$m=$m+1;
							if($m==1){
								?>
            <li class="nav-header">Servicios</li>
            <li class="active"><span class="add-on"><i class="icon-globe"></i></span><a href="#<?php echo $row['informacionid'] ?>" > <?php echo $row['titulo']?></a></li>
            <?php  }else{ ?>
            <li class=""><span class="add-on"><i class="icon-globe"></i></span><a href="#<?php echo $row['informacionid']?>"> <?php echo $row['titulo']?></a></li>
            <?php }
					     } 
                        } 
					   } 
					   ?>
                       </div>
          </ul>
        </nav>
      </aside>
    </div>
    <div class="span10"> <br>
      <div class=" row-fluid span12">
        <h2 id="in" align="left " class="well span11"> Servicios</h2>
      </div>
      <?php  
		
		$SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		
	if($registros != 0){
			for ($i=0;$i<$registros;$i++)
			{
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']=="Servicios"){
					?>
      <div class="span12">
        <div  align="justify" class="span8"> <p>  <?php echo "<blockquote>".$row['descripcion'] ?> </p> </div>
        <div class="span3">  <img src="<?php echo $row['imagen']?>"> </div>
      </div>
     
      <?php
	  
					
				}
			}
			
			$SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		
	if($registros != 0){
		?>
      <div class="accordion span11" id="accordion2">
        <?php
			for ($i=0;$i<$registros;$i++)
			{
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']!="Servicios"){
					
					 ?>
        <div id="<?php echo $row['informacionid'] ?>" class="accordion-group">
          <div  class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c<?php echo $row['informacionid'] ?>"> <?php echo $row['titulo']?> </a> </div>
          <div id="c<?php echo $row['informacionid']?>" class="accordion-body collapse">
            <div class="accordion-inner">
              <div class="span12 well">
                <div align="justify" class="span8"> <?php echo $row['descripcion'] ?> </div>
                <div class="span3"> <img src="<?php echo $row['imagen']?>"> </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php 			   }
				}
 			}
			?>
      </div>
      <?php
	}
?>
    </div>
  </div>
</div>

<script type="text/javascript" src="recursos/circular/js/jquery.contentcarousel.js"></script> 
<script type="text/javascript" src="recursos/js/funciones.js" ></script> 
<script type="text/javascript" src="recursos/circular/js/jquery.easing.1.3.js"></script> 
<!-- the jScrollPane script -->

<body>
</html>
