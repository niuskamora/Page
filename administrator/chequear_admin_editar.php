<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();

//Disponibilidad del nombre de usuario
if(isset($_REQUEST['usuario2']) && $_REQUEST['usuario2']!="") {
   
   	$id=$_REQUEST['id'];
    $username = $_REQUEST['usuario2'];
	$SQL="SELECT * FROM administrador where usuario='".$username."' and administradorid!='".$id."'";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
    if($registros>0)
        echo '<div id="Error">No disponible</div>';
    else
        echo '<div id="Success">Disponible</div>';
}else{
	  echo '<div></div>';
	}
	
	
//Seguridad de la contraseña
if(isset($_REQUEST['contrasena']) && $_REQUEST['contrasena']!="") {
   
    $contrasena = $_REQUEST['contrasena'];
	if(strlen($contrasena)<6)
        echo '<div id="Error">Debil</div>';
    elseif(strlen($contrasena)>6&&strlen($contrasena)<12){
		
		}
        echo '<div id="Success">Disponible</div>';
}else{
	  echo '<div></div>';
	}
	
	
//Chequeo de que las contraseñas sean iguales

if(isset($_REQUEST['contrasena_c']) && $_REQUEST['contrasena_c']!="" && $_REQUEST['contra']!="") {
	
    if($_REQUEST['contra']==$_REQUEST['contrasena_c'])
		echo '<div id="Success">Coinciden</div>';
        
    else
        echo '<div id="Error">No Coinciden</div>';
}else{
	  echo '<div></div>';
	}
?>