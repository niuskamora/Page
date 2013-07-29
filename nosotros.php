<?php
session_start();

include("recursos/funciones.php");
$conn=conectar();

if(!isset($_GET['id'])){
	iraURL('index.php');
}
else{
	if($_GET['id']!='5'){
		iraURL('nosotros.php?id=5');
	}
}

//inicio de sesión 
if (isset($_POST["inicio"])) {
   iniciosesion_cliente($_POST["usuario"],$_POST["password"]);
}
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
<div class="container-fluid" style="background-image: url('recursos/img/back.jpg'); background-repeat: repeat;">
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
          <a href="index.php" ><a href="index.php" > <img  src="recursos/img/logo.png" style="margin-bottom: 3px;" height="160" /></a></a>
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
              <?php   menu_principal(0,"nosotros"); ?>  
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
						<li><a href="recursos/quitarsesioncliente.php?pagina=../nosotros.php?id=5">Cerrar Sesión</a></li>
						  </ul></li>';			
				  }else{ ?>
                <li>
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Iniciar Sesión
						<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li> <form   method="post">
                         <div class="well" align="center">
                          <span>Nombre de usuario</span>
        <input type="text"  placeholder="Usuario" name="usuario" id="usuario"  title="El formato es Mayúscula(letras, puntos o números)" maxlength="34" pattern="[A-ZÑ]{1}[a-z.ñ0-9]{1,33}" autofocus required>
                         <span>Contraseña</span>
        <input type="password"  placeholder="Contraseña" name="password" id="password" maxlength="34"  title="Debe agregar la contraseña" required>
                        <button type="submit" id="inicio" name="inicio" class="btn submit">Iniciar Sesión</button>

                         </div>
                        </form></li>
                       </ul></li>
                
                </li>
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
  <div class="span12">
	<div class="row-fluid">
    	<div class="span2">
        	<aside class="span2 well affix" data-spy="affix">
				<nav id="website-nav" class="sidebar-nav">
					<ul id="website-nav" class="nav nav-list">
        				<?php $SQL="SELECT * FROM  informacion WHERE  tipoinformacionid=".$_GET['id']." ORDER BY informacionid";
						$result=pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
						$registros=pg_num_rows($result);
						$m=0;
						if($registros!=0){?>
							<div class="accordion" id="accordion2">
       						 <?php for ($i=0;$i<$registros;$i++){
								$row = pg_fetch_array($result);
								if($row['titulo']=="Nosotros"){?>
                                    <br>
									<li class="nav-header">Nosotros</li>
                                    <li class="active"><span class="add-on"><i class="icon-globe"></i></span><a href="#<?php echo $row['informacionid'];?>"><?php echo $row['titulo']?></a></li>
                            		<?php }else{?> 
										  <li class=""><span class="add-on"><i class="icon-globe"></i></span><a href="#<?php echo $row['informacionid'];?>"><?php echo $row['titulo']?></a></li>
                       				<?php }
					    			} 
                        		} 
					 		?>
                        </ul>
					</nav>
				</aside>
		</div>
        
<div class="span10">
  <?php  
		
	$SQL="SELECT * FROM  informacion WHERE tipoinformacionid=".$_GET['id']." ORDER BY informacionid";
	$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
	$registros= pg_num_rows($result);
		
	if($registros != 0){
		for ($i=0;$i<$registros;$i++){
			$row = pg_fetch_array ($result,$i);
			if($row['titulo']=="Nosotros"){?>
				<div id="<?php echo $row['informacionid'];?>" class="span12">
                  	<br>
                  	<br>
                   	<br>
					<div align="justify" class="span8">
                    	<h2 id="in" align="left"><?php echo $row['titulo'];?></h2>
                		<?php echo $row['descripcion'];?>
                	</div>
					<div class="span3">
					<?php if($row['imagen']!=""){ ?>
                    	<br>
                    	<br>
       					<img src="<?php echo $row['imagen'];?>">
					<?php }?>
                    </div>
				</div>
               <?php	
				}
				else{
					?>
				<div id="<?php echo $row['informacionid'];?>" class="span12">
                	<div align="justify" class="span8">
                		<br>
                		<br>
                		<br>
                		<h2 id="in" align="left"><?php echo $row['titulo'];?></h2> 
                		<?php echo $row['descripcion'];?>
                	</div>
                    <div class="span3">
                	<?php if($row['imagen']!=""){ ?>
                    	<br>
                    	<br>
                        <br>
       					<img src="<?php echo $row['imagen'];?>">
					<?php }?>
                    </div>
				</div>
               <?php	
				}
			}
		?>
 		</div>
	</div>
	<?php
	}
	?>
		</div>
	</div>
</div>

<div id="cont2" class="container" >

  <h2 class="section_header">
    <span><!-- aqui iba el autor --></span>
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

</body>
</html>
