<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();

javaalert("Contraseña:".$_REQUEST['con']."y contraseña_C".$_REQUEST['contrasena_c']);

if($_REQUEST['contrasena']!="" && $_REQUEST['contrasena_c']!="") {
	
	$con = $_REQUEST['contrasena'];
	$con1 = $_REQUEST['contrasena_C'];
   
    if($con==$con1)
		echo '<div id="Success"></div>';
        
    else
        echo '<div id="Error"></div>';
}else{
	  echo '<div></div>';
	}
?>