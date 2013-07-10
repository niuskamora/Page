<?php

function conectar(){{
	   if (!($conexion = pg_connect("host=192.168.1.102 dbname=pangeapage port=5432 user=postgres password=p4ng34"))){
	       echo "No pudo conectarse al servidor";
	       exit();
	   }
	    return $conexion;
	}
}

function desconectar($conexion){
	pg_close($conexion);
	
}
?>