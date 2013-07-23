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

<style></style>
<link rel=StyleSheet href="recursos/css/bootstrap-responsive.min.css" type="text/css" />
<link rel=StyleSheet href="recursos/slide/jquery.pageslide.css" type="text/css" />
<script type="text/javascript" src="recursos/js/jquery-2.0.2.js" ></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="recursos/js/jquery.contenthover.js" ></script> 
<script type="text/javascript" src="recursos/js/jquery.contenthover.min.js" ></script>
<head>
<body>

<script type="text/javascript" src="recursos/js/bootstrap.min.js" ></script> 



 
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
<br>
<div class="container" style="background-color:white;">
  <div class=" row-fluid ">
 
  <h2 id="in" class="well span12"> Tecnología</h2>
    
      <?php  
		
		$SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id'];
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		
	if($registros != 0){
			for ($i=0;$i<$registros;$i++)
			{
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']=="Tecnología"){
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
      <div class="span12">
        <?php
			for ($i=0;$i<$registros;$i++)
			{
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']!="Tecnología"){
					$vector[] =$row['informacionid'];
					 ?>
       
    
        <img class="my" src="<?php echo $row['imagen'] ?>"  id="d1" name="d1" style="width:300px; height:240px;"/> 
       

		<div class="contenthover">
    	<h3><?php echo $row['titulo'] ?></h3>
    	<p><?php echo $row['descripcion'] ?></p>
   			 <?php if($row['enlace']!=''){?> 
   			 <p><a href=" <?php echo $row['enlace'] ?>" class="mybutton" ><?php echo $row['titulo'] ?></a></p>
    	</div>
        
    <?php } ?>
    

        
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

<script type="text/javascript">
	$(document).ready(
		function()
		{
			
			$('.my').contenthover({
   				 overlay_background:'#333'
							});
							
							
		
		}
	);
	</script>
<!-- the jScrollPane script -->

<body>
</html>
