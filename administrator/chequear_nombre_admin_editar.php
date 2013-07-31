<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();
$id=$_REQUEST['id'];
if(isset($_REQUEST['usuario2'])) {
   
    $username = $_REQUEST['usuario2'];
	$SQL="SELECT * FROM administrador where usuario='".$username."' and administradorid!='".$id."'";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
    if($registros>0)
        echo '<div id="Error">No disponible</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
?>