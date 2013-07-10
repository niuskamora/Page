<!DOCTYPE html>
    <head>
        <title>Facelet Title</title>
        <title>Nuevo proyecto con Bootstrap 2.0</title>
        <meta name="description" content="Artículo en GenbetaDev sobre Bootstrap 2.0"/>
        <meta name="author" content="Gerson Ramirez"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
    
        <link rel=StyleSheet href="recursos/css/bootstrap.min.css" type="text/css" />
        <style>
            #magic-line { position: absolute; bottom: -2px; left: 0; width: 100px; height: 2px; background: #fe4902; }

            #pageslide {
                /* These styles MUST be included. Do not change. */
                display: none;
                position: absolute;
                position: fixed;
                top: 0;
                height: 100%;
                z-index: 999999;

                /* Specify the width of your pageslide here */
                width: 55%;
                padding: 3px;

                /* These styles are optional, and describe how the pageslide will look */
                background-color: #333;
                color: #FFF;
                -webkit-box-shadow: inset 0 0 5px 5px #222;
                -moz-shadow: inset 0 0 5px 5px #222;
                box-shadow: inset 0 0 5px 5px #222;
            }


            @media screen and (max-width: 48.063em) {
                #magic-line { display: none;

                }
            }






        </style>
        <link rel=StyleSheet href="recursos/css/bootstrap-responsive.min.css" type="text/css" />
       <link rel=StyleSheet href="slide/jquery.pageslide.css" type="text/css" />
       
    </h:head>
    <h:body>
	<script type="text/javascript" src="recursos/js/jquery-2.0.2.js" ></script>
     <script type="text/javascript" src="recursos/js/bootstrap.min.js" ></script>
 <script type="text/javascript" src="recursos/slide/jquery.pageslide.min.js" ></script>
  
        <div  class="container-fluid" style="background-image: url('recursos/imagenes/back.jpg'); background-repeat: repeat;">
            <div id="fullp">
                <div class="container" style="background-color:white;">
                    <div class="row-fluid">
                        <div class="span12">

                            <div class="row-fluid visible-desktop">
                                <div class="span12">

                                    <div class="row-fluid">
                                        <div class="span2" style="text-align: left;" >
                                            <img  src="recursos/img/izquierdasuperior.png" style="margin-bottom: 3px;" /> 
                                        </div>
                                        <div class="span8" style="text-align: center;">
                                             <img  src="recursos/img/logo.png" style="margin-bottom: 3px; height:160px;" height="160" /> 
                                        </div>
                                        <div class="span2"  style="text-align: right;">
                                             <img  src="recursos/img/derechainferior.png" style="margin-bottom: 3px; text-align: left;" /> 
                                        </div>                    
                                    </div>
                                </div>
                            </div>

                            <!--Nav bar content-->
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="container">
                                        <a id="open" href="#nav" class="btn btn-navbar" data-toggle="collapse" data-target="#barrac">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>

                                        </a>
                                        <a id="open2" href="#" class="btn btn-navbar" data-toggle="collapse" data-target="#login">
                                            <i class="icon-user"></i>

                                        </a>
                                        <a class="brand hidden-desktop" href="#"><p:graphicImage style=""  value="recursos/imagenes/logo.png" width="140" height="30"/> 
                                        </a>

                                        <div id="barrac" class="nav-collapse collapse">
                                            <ul id="nav" class="nav slidernav">
                                                <li class="active">

                                                    <a href="#">Home</a></li>
                                                <li><a href="#portfolio">Portfolio</a></li>
                                                <li><a href="#product">Product</a></li>
                                                <li class="dropdown">

                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Equipos <b class="caret"></b></a>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="#team">Teama</a></li>
                                                        <li><a href="#team2">Teamb</a></li>
                                                    </ul>

                                                </li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="#contact">Contact</a></li>

                                            </ul>

                                        </div><!--/.nav-collapse -->
                                        <div id="login" class="nav-collapse collapse">
                                            <ul id="log" class="nav pull-right">
                                                <li><a href="/users/sign_up">Registrarse</a></li>
                                                <li class="divider-vertical"></li>
                                                <li><a href="/users/sign_up">Iniciar sesion</a></li>

                                            </ul>



                                        </div><!--/.nav-collapse -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container" style="background-color:white;">

                    <!-- Main hero unit for a primary marketing message or call to action -->
                    <div class="hero-unit">

                        <div class="row-fluid">
                            <div class="span6">
                                <h2>Servicios</h2> 

                                <p>
                                    A través de nuestros servicios tecnológicos ponemos a disposición una gama de soluciones adecuada a las necesidades de su organización, contamos con un grupo de profesionales altamente capacitados con valores, dispuestos a trabajar de la mano para ayudarle a potenciar su negocio. 
                                </p>
                            </div>
                            <div class="span6">
                                <!-- Embed your code for Presentation or video -->
                                <div id="myCarousel" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item"> 
                                            <img style="width:100%;"   src="recursos/img/servitest.png" /></div>
                                        <div class="item">  <img style="width:100%;" src="recursos/img/servitest.png" />
                                        </div>
                                        <div class="item">  <img style="width:100%;" src="recursos/img/servitest.png" />
                                        </div>
                                    </div>
                                    <!-- Carousel nav -->
                                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                                </div>

                                <div style="margin-bottom:5px"> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widget Area , Rows and Columns -->
                    <div class="row-fluid">
                        <div class="span12" style="padding:5px">
                            <div class="span4">
                                <div class="well">
                                    <h2>Portfolio</h2>
                                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                    <p><a class="btn" href="#">View details </a></p>
                                </div>

                            </div>
                            <div class="span4">
                                <div class="well">
                                    <h2>Product</h2>
                                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                    <p><a class="btn" href="#">View details </a></p>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="well">
                                    <h2>Team</h2>
                                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                    <p><a class="btn" href="#">View details </a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr/>



                </div> <!-- /container -->

                <div id="footer" class="container" style="background-color: white; text-align: center;">
                    <div class="container">
                        <div class="well well-small">
                            <p class="muted credit">Pangea Technologies | RIF: J-29521849-0
                                Copyright © 2010. All rights reserved.</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            $(document).ready(function() {




                $('.carousel').carousel({
                    interval: 2000
                });
            });
            $(document).ready(function() {
                magicline();
            });

            function magicline() {

                var $el, leftPos, newWidth,
                        $mainNav = $("#nav");
                $("#magic-line").remove();
                $mainNav.append('<li id="magic-line"></li>');
                var $magicLine = $('#magic-line');

                $magicLine
                        .width($('.active').width())
                        .css('left', $('.active a').position().left)
                        .data('origLeft', $magicLine.position().left)
                        .data('origWidth', $magicLine.width());

                $('#nav li a').hover(function() {

                    $el = $(this);

                    leftPos = $el.position().left;
                    if ($el.closest('li.dropdown').size() != 0)
                        leftPos += $el.closest('li.dropdown').position().left;
                    newWidth = $el.parent().width();
                    $magicLine.stop().animate({
                        left: leftPos,
                        width: newWidth
                    });
                }, function() {
                    $magicLine.stop().animate({
                        left: $magicLine.data('origLeft'),
                        width: $magicLine.data('origWidth')
                    });
                });
            }
            $('li a').on('click', function() {
                $('li').each(function() {
                    $(this).removeClass('active');

                });
                $(this).parent().addClass('active');
                magicline();
            });


        </script>
    <body>




</html>

