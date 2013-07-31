<?php
include("../recursos/funciones.php");
sleep(1);
$conn=conectar();
if(isset($_REQUEST['usuarioo'])&&$_REQUEST['usuarioo']!="") {
   
    $username = $_REQUEST['usuarioo'];
	$SQL="SELECT * FROM usuario where usuario='".$username."'";
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