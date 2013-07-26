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
        <div class="headera" style="text-align: left;" >
           <img  src="recursos/img/izquierdasuperior.png" style="margin-bottom: 3px;" />
           </div>
        <div  class="headerb" style="text-align: center;">
           <img  src="recursos/img/logo.png" style="margin-bottom: 3px;" height="150" />
           </div>
        <div class="headerc"  style="text-align: right;">
           <img  src="recursos/img/derechainferior.png" style="margin-bottom: 3px; text-align: left;" />
           </div>
      </div>
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container"><a id="open" href="#nav" class="btn btn-navbar" data-toggle="collapse" data-target="#barrac"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
          <a id="open2" href="#" class="btn btn-navbar" data-toggle="collapse" data-target="#login"><i class="icon-user icon-white"></i></a> <a class="brand visible-desktop" style="float:left" href="#"><img  src="recursos/img/logop.png" width="140" height="20"/></a>
            <div id="barrac" class="nav-collapse collapse">
              <ul id="nav" class="nav slidernav">
              <?php   menu_principal(0,"home"); ?>  
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
						<li><a href="recursos/quitarsesioncliente.php?pagina=../index.php">Cerrar Sesión</a></li>
						  </ul></li>';			
				  }else{ ?>
                <li><a href="iniciosesion.php?pagina=index.php">Iniciar sesión</a></li>
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
<div class="container" style="background-color:white;">
  <div id="hero" class="visible-desktop">
    <div class="container">
      <div class="row animated fadeInDown">
        <div class="span12">
          <div id="myCarousel" class="carousel slide"> 
            <!-- Carousel items -->
            <div class="carousel-inner">
             <?php 
			 obtenerBanners();
			 ?>
            </div>
            <!-- Carousel nav --> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="hero" class="hidden-desktop">
    <div class="container">
      <div class="row animated fadeInDown">
        <div class="span12">
         <?php 
		 obtenerBannermovil();
		 ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="cont2" class="container" >
<?php 
 $frase=obtenerQuote();

?>
  <div id="intro">
    <div class="container">
      <h1> "<?php echo $frase[1]; ?>" </h1>
    </div>
  </div>
  <br>
  <h2 class="section_header">
    <hr class="left visible-desktop">
    <span><?php echo $frase[0]; ?></span>
    <hr class="right visible-desktop">
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
$(document).ready(function() {
 
$('.dropdown-toggle').click(function(e) {
  e.preventDefault();
  setTimeout($.proxy(function() {
    if ('ontouchstart' in document.documentElement) {
      $(this).siblings('.dropdown-backdrop').off().remove();
    }
  }, this), 0);
});
 
 
});



</script>
<script type="text/javascript" src="recursos/circular/js/jquery.easing.1.3.js"></script> 


<!-- the jScrollPane script -->

<body>
</html>
