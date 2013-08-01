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
?>