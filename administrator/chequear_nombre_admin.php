<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();
if(isset($_REQUEST['usuario1'])) {
   
    $username = $_REQUEST['usuario1'];
	$SQL="SELECT * FROM administrador where usuario='".$username."'";
		$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
		$registros= pg_num_rows($result);
    if($registros>0)
        echo '<div id="Error">No disponible</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
?>