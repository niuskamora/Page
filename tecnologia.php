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
<body>
 



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="recursos/js/jquery.contenthover.js" ></script>
<script type="text/javascript" src="recursos/js/jquery.contenthover.min.js" ></script>
<script type="text/javascript" src="recursos/js/bootstrap.min.js" ></script> 
<script type="text/javascript" src="recursos/slide/jquery.pageslide.min.js" ></script>
<a href="#" class="scrolltop" style="display: none;"> <span>up</span> </a>
<div  class="container-fluid" style="background-image: url('recursos/img/back.jpg'); background-repeat: repeat;">
  
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
                    <?php   menu_principal(0,"Tecnologia"); ?>
                  </ul>
                </div>
                <!--/.nav-collapse -->
                <div id="login" class="nav-collapse collapse">
                  <ul id="log" class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <?php  
			  	if(existesesioncliente()){
					echo '<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'
						<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li><a href="recursos/quitarsesioncliente.php?pagina=../tecnologia.php?id=4">Cerrar Sesión</a></li>
						  </ul></li>';			
				  }else{ ?>
                <li><a href="iniciosesion.php?pagina=tecnologia.php?id=4">Iniciar sesión</a></li>
                <?php } ?> 
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
        <div  align="center" class="span12">
          <div  align="justify" class="span8">
            <p> <?php echo "<blockquote>".$row['descripcion'] ?> </p>
          </div>
          
          <div align="center" class=" span3 well" style=" border-radius:5px; width:250px; height:200px; padding:3px; background-color:rgb(0,0,102)">
          <img src="<?php echo $row['imagen']?>" style="width:240px; height:193px;"> </div>
          </div>
        
        <?php
	  
					
				}
			}
			
			$SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id']." order by titulo";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
		$aux=0;
		
		?>
       </div>
       <div align="center" class="row-fluid">
       
        <h4 class="visible-phone alert-block alert-info table-bordered"> Pulsa en la imagen para ver la información </h4>
         <h4 class="visible-tablet alert-block alert-info table-bordered"> Pulsa en la imagen para ver la información </h4>
        <?php
	if($registros != 0){
		?>
        <br>
        <br>
        <br>
        <br>
        <div align="center" class="span12">
          <?php
 		$act=0;
		$ban=0;
		
			 for ($i=0;$i<$registros;$i++)
			{
				
				$row = pg_fetch_array ($result,$i);
				
				if($row['titulo']!="Tecnología"){
					$vector[] =$row['informacionid'];
					$aux=$aux+1;
					
					
					 ?>
                     
            <div align="center" class="span3" style="margin-left:3px; border-color:rgb(0,0,102);: border-left-radius:5px; border-radius:5px;">
            <div align="center" class="well" style=" border-radius:5px; width:180px; height:200px; padding:3px; background-color:rgb(0,0,102);">
            
            <div id="<?php echo $row['informacionid'] ?>" style="width:180px; height:200px; background:#eee; ">
    <div style="padding:2px;">
   
        <p><img src="<?php echo $row['imagen'] ?>"style="width:180px; height:130px;" /></p>
         <?php if(strlen($row['titulo'])<9) {?>
        <div align="center" style="font-size:40px; margin-top:25px;  color: rgb(0,0,102); text-shadow: 0.1em 0.1em 0.2em  #796565;"> <?php echo $row['titulo'] ?></div>
        <?php }else if(strlen($row['titulo'])<11){ ?>
        <div align="center" style="font-size:32px; margin-top:25px;  color: rgb(0,0,102); text-shadow: 0.1em 0.1em 0.2em  #796565;"> <?php echo $row['titulo'] ?></div>
        <?php }else{?>
         <div align="center" style="font-size:18px; margin-top:25px;  color: rgb(0,0,102); text-shadow: 0.1em 0.1em 0.2em  #796565;"> <?php echo $row['titulo'] ?></div>
        <?php }?>
    </div>

      </div>     
       <div class="contenthover">
              <h4><?php echo $row['titulo'] ?></h4>
              <p align="justify"><?php echo $row['descripcion'] ?></p>
              <?php if($row['enlace']!=''){?>
              <p><a href=" <?php echo $row['enlace'] ?>" class="mybutton" ><?php echo $row['titulo'] ?></a></p>
              <?php		
			  }?>
            </div>
             </div>
            </div>
            <?php 
           
	  			   }
				}
				
			?>
        
      </div>
      <?php 
 			}
			?>
    </div>
    <?php
	
	}
?>
 </div>
<div id="cont2" class="container" >
<?php 
 $frase=obtenerQuote();

?>
  <div id="intro">
    <div class="container">
    
    </div>
  </div>
  <br>
  <h2 class="section_header">

  </h2>
  <br>
  <div class="row-fluid">
    <div class="span12 visible-desktop" style="padding:5px">
      <div id="ca-container" class="ca-container">
        <div class="ca-wrapper">
          <div class="ca-item ca-item-1">
            <div class="ca-item-main">
              <div class="ca-icon"></div>
              <h2>Portafolio</h2>
              <h4> <span class="ca-quote">&ldquo;</span> <span>
                <p>Destacando nuevas soluciones para un mercado tan cambiante, pangea technologies ofrece un abanico de posibilidades.</p>
                <p><a class="btn" href="#">Portafolio</a></p>
                </span> </h4>
            </div>
            <div class="ca-content-wrapper">
              <div class="ca-content">
                <h6>Animals are not commodities</h6>
                <a href="#" class="ca-close">close</a>
                <div class="ca-content-text">
                  <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
                  <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
                  <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
              </div>
            </div>
          </div>
          <!--fin del primero -->
          
          <div class="ca-item ca-item-2">
            <div class="ca-item-main">
              <div class="ca-icon"></div>
              <h2>Productos</h2>
              <h4> <span class="ca-quote">&ldquo;</span> <span>
                <p>Pangea Technologies mantiene una gama de productos adaptadas a las necesidades del entorno empresarial.</p>
                <p><a class="btn" href="#">Ver Productos</a></p>
                </span> </h4>
            </div>
            <div class="ca-content-wrapper">
              <div class="ca-content">
                <h6>Animals are not commodities</h6>
                <a href="#" class="ca-close">close</a>
                <div class="ca-content-text">
                  <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
                  <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
                  <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
              </div>
            </div>
          </div>
          <!--fin del segundo -->
          
          <div class="ca-item ca-item-3">
            <div class="ca-item-main">
              <div class="ca-icon"></div>
              <h2>Equipo</h2>
              <h4> <span class="ca-quote">&ldquo;</span> <span>
                <p>Desarrolladores y Analistas capacitados en un gran numero de areas para proveer soporte en nuevas tecnologias.</p>
                </span> </h4>
            </div>
            <div class="ca-content-wrapper">
              <div class="ca-content">
                <h6>Animals are not commodities</h6>
                <a href="#" class="ca-close">close</a>
                <div class="ca-content-text">
                  <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
                  <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
                  <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
              </div>
            </div>
          </div>
          <!--fin del tercero -->
          <div class="ca-item ca-item-4">
            <div class="ca-item-main">
              <div class="ca-icon"></div>
              <h2>Sucursales</h2>
              <h4> <span class="ca-quote">&ldquo;</span> <span>
                <p>Puntos de encuentro extendidos por toda venezuela con atencion garantizada.</p>
                </span> </h4>
            </div>
            <div class="ca-content-wrapper">
              <div class="ca-content">
                <h6>Animals are not commodities</h6>
                <a href="#" class="ca-close">close</a>
                <div class="ca-content-text">
                  <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
                  <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
                  <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
              </div>
            </div>
          </div>
          <!--fin del cuarto --> 
        </div>
      </div>
      <hr/>
    </div>
    <div class="span12 hidden-desktop" style="padding:5px">
      <div class="span4 ca-item ca-item-1">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h2>Portafolio</h2>
          <h4> <span class="ca-quote">&ldquo;</span> <span>
            <p>Destacando nuevas soluciones para un mercado tan cambiante, pangea technologies ofrece un abanico de posibilidades.</p>
            <p><a class="btn" href="#">Portafolio</a></p>
            </span> </h4>
        </div>
        <div class="ca-content-wrapper">
          <div class="ca-content">
            <h6>Animals are not commodities</h6>
            <a href="#" class="ca-close">close</a>
            <div class="ca-content-text">
              <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
              <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
              <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            </div>
          </div>
        </div>
      </div>
      <!--fin del primero -->
      
      <div class="span4 ca-item ca-item-2">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h2>Productos</h2>
          <h4> <span class="ca-quote">&ldquo;</span> <span>
            <p>Pangea Technologies mantiene una gama de productos adaptadas a las necesidades del entorno empresarial.</p>
            <p><a class="btn" href="#">Ver Productos</a></p>
            </span> </h4>
        </div>
        <div class="ca-content-wrapper">
          <div class="ca-content">
            <h6>Animals are not commodities</h6>
            <a href="#" class="ca-close">close</a>
            <div class="ca-content-text">
              <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
              <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
              <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            </div>
          </div>
        </div>
      </div>
      <!--fin del segundo -->
      
      <div class="span4 ca-item ca-item-3">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h2>Equipo</h2>
          <h4> <span class="ca-quote">&ldquo;</span> <span>
            <p>Desarrolladores y Analistas capacitados en un gran numero de areas para proveer soporte en nuevas tecnologias.</p>
            </span> </h4>
        </div>
        <div class="ca-content-wrapper">
          <div class="ca-content">
            <h6>Animals are not commodities</h6>
            <a href="#" class="ca-close">close</a>
            <div class="ca-content-text">
              <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
              <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
              <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            </div>
          </div>
        </div>
      </div>
      <!--fin del tercero -->
      <div class="span4 ca-item ca-item-4">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h2>Sucursales</h2>
          <h4> <span class="ca-quote">&ldquo;</span> <span>
            <p>Puntos de encuentro extendidos por toda venezuela con atencion garantizada.</p>
            </span> </h4>
        </div>
        <div class="ca-content-wrapper">
          <div class="ca-content">
            <h6>Animals are not commodities</h6>
            <a href="#" class="ca-close">close</a>
            <div class="ca-content-text">
              <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
              <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
              <p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            </div>
          </div>
        </div>
      </div>
      <!--fin del cuarto -->
      <hr/>
    </div>
    <!-- /container -->
    
    <div id="footer" class="container" style="background-color: white; text-align: center;">
      <div class="container">
        <div class="well well-small">
          <p class="muted credit">Pangea Technologies | RIF: J-29521849-0
            Copyright © 2013. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="recursos/circular/js/jquery.contentcarousel.js"></script> 
<script type="text/javascript" src="recursos/js/funciones.js" ></script> 
<script type="text/javascript">
	$(document).ready(
	
		
	
	
		function()
		{
				$('.dropdown-toggle').click(function(e) {
 		 e.preventDefault();
 		 setTimeout($.proxy(function() {
   	if ('ontouchstart' in document.documentElement) {
      $(this).siblings('.dropdown-backdrop').off().remove();
   			 }
				  }, this), 0);
			});
			
			
			
			
			<?php $j=0; 
			 while($j<$aux){ ?>
			$('#<?php echo $vector[$j] ?>').contenthover({
   				 overlay_background:'#034482',
   					 effect:'slide',
   					 slide_speed:500,
   					 slide_direction:'left',
							});
			<?php $j=$j+1;} ?>
		     	}
			
		
	);
	</script> 
<!-- the jScrollPane script -->

<body>
</html>