<?php

function conectar(){{
	   if (!($conexion = pg_connect("host=192.168.1.101 dbname=pangeapage port=5432 user=postgres password=p4ng34"))){
	       echo "No pudo conectarse al servidor";
	       exit();
	   }
	    return $conexion;
	}
}

function desconectar($conexion){
	pg_close($conexion);
	
}

function crearsesion($u,$p){

	if($u!="" || $p!=""){
		$_SESSION["usuarioadmin"] = strtolower($u);
		$_SESSION["passwordadmin"] = $p;
		return true;
	}else
		iraURL('../administrator/principal.php');
}

function validarlogin(){

	if(existesesion()){
		$conex = conectar();
		
		$usu = $_SESSION["usuarioadmin"];
		$pass = $_SESSION["passwordadmin"];
		
		
		$query="SELECT administradorid FROM administrador WHERE usuario='$usu' AND contrasena='$pass'";
		$Qlogin = pg_query($conex,$query) or die(pg_last_error($conex));
		$fila = pg_fetch_array($Qlogin);
		
		if(pg_num_rows($Qlogin) == 0){
			javaalert('Usuario o Contraseña invalida!');
			quitarsesion();
			return false;
		}else{ 
		//inserta en logs
		
			$_SESSION["id_usuario"]=$fila["administradorid"];
			//$_SESSION["rol"]=strtolower($fila["nombre"]);
			iraURL('../administrator/principal.php');
			return true;
			
		}
	}else
		return false;
	
	
}

function existesesion(){
	if(isset($_SESSION["usuarioadmin"]) && isset($_SESSION["passwordadmin"]))
		return true;
	else
		return false;
}

function iraURL($url){
	$ini='<script language="javascript">
				window.location = "';
	$fin='"; </script>';
	
	echo $ini.$url.$fin;
}

function quitarsesion(){
    if(isset($_SESSION["id_usuario"]))
	//llenarLog($_SESSION["id_usuario"],5,"Bitacora","");
    
	unset($_SESSION["usuario"]);
	unset($_SESSION["password"]);
}

function javaalert($msj){
	$ini='<script language="javascript">	alert("';
	$fin='"); </script>';
	echo $ini.$msj.$fin;
}
?>