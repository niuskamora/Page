<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();

//Chequeo de que las contraseñas sean iguales

if(isset($_REQUEST['contrasena_c']) && $_REQUEST['contrasena_c']!="" && $_REQUEST['contra']!="") {
	
    if($_REQUEST['contra']==$_REQUEST['contrasena_c'])
		echo '<div id="Success">Coinciden</div>';
        
    else
        echo '<div id="Error">No Coinciden</div>';
}else{
	  echo '<div></div>';
	}
	
if(isset($_REQUEST['contrasena']) && $_REQUEST['contrasena']!="" && $_REQUEST['contra']!="") {
	
    if($_REQUEST['contra']==$_REQUEST['contrasena'])
		echo '<div id="Success">Coinciden</div>';
        
    else
        echo '<div id="Error">No Coinciden</div>';
}else{
	  echo '<div></div>';
	}
?>