<?php

//conexión de la base de dattos  
function conectar(){{  
	   if (!($conexion = pg_connect("host=192.168.1.101  dbname=pangeapage port=5432 user=postgres password=p4ng34"))){
	       echo "No pudo conectarse al servidor";
	       exit();
	   }
	    return $conexion;
	}
}
//desconectar la base de datos
function desconectar($conexion){
	pg_close($conexion);
	
}

//creación de sesiones de administradores
function crearsesion($u,$p){

	if($u!="" && $p!=""){
		$_SESSION["usuarioadmin"] = strtolower($u);
		$_SESSION["passwordadmin"] = $p;
		
		return true;
	}else
		return false;
}

// validación de usuario de administradores
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
			
			return true;
			
		}
	}else
		return false;
	
	
}
//verificando  sesiones de administradores
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

//eliminando variables de sesion de cuenta de administradores
function quitarsesion(){
    if(isset($_SESSION["id_usuario"]))
	llenarLog(5,"EN CUENTA DE ADMINISTRADORES");
	unset($_SESSION["usuarioadmin"]);
	unset($_SESSION["passwordadmin"]);
	unset($_SESSION["id_usuario"]);
	
}
//alertas
function javaalert($msj){
	$ini='<script language="javascript">	alert("';
	$fin='"); </script>';
	echo $ini.$msj.$fin;
}
//bitacora del  sitio web
function llenarLog($accion,$descripcion){

	$conex = Conectar();
		switch($accion){
		case 1:
			$accion="INSERCIÓN";
			break;
		case 2:
			$accion="MODIFICACIÓN";
		break;
		case 3:
			$accion="BORRADO";
			break;
		case 4:
			$accion="INICIO DE SESIÓN";
			break;
		case 5:
			$accion="FIN DE SESIÓN";
			break;	
		}
pg_query($conex,"INSERT INTO bitacora values(nextval('bitacora_bitacoraid_seq'),'".$accion."',current_date,current_time,".$_SESSION["id_usuario"].",'".$descripcion."')") or die(pg_last_error($conex));

}
//Traer Menu principal
function menu_principal($idm,$activo)
{
	
	$conex = conectar();
		
			
		$query="SELECT a.menuid,a.nombre,a.submenu,a.enlace,a.orden,count(b.menuid) as cant 
         FROM menu a full join menu b on a.menuid=b.submenu WHERE a.submenu=".$idm."  group by a.menuid order by orden asc,nombre asc";
		$Qmenu = pg_query($conex,$query) or die(pg_last_error($conex));
		$numerof=pg_num_rows($Qmenu);
		
		if($numerof > 0){ 
	
		
		      for($i=0;$i<$numerof;$i++)
			  {
				  	$row = pg_fetch_array($Qmenu,$i);
	
				     if($row['cant']==0)
					 {
						if(strtolower($activo)==strtolower($row['nombre']))
						   echo '<li class="active"><a href="'.$row['enlace'].'">'.$row['nombre'].'</a></li>';
               			else
			  			  echo '<li><a href="'.$row['enlace'].'">'.$row['nombre'].'</a></li>';
						 
						 
					 }
					 else
					 {
						echo '<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						'.$row['nombre'].'
						<b class="caret"></b></a>
                        <ul class="dropdown-menu">';
						menu_principal($row['menuid'],$activo);
						echo ' </ul></li>';
						
						 
						 
					 }
				  
				  
			  }
		
		
		
		  }
	
}
function obtenerQuote()
{
	$conex = conectar();
	$query="select informacion.titulo,informacion.descripcion
from informacion,tipoinformacion 
where lower(tipoinformacion.nombre)='quotes' and informacion.tipoinformacionid=tipoinformacion.tipoinformacionid
order by random() limit 1 ;";
	$Qmenu = pg_query($conex,$query) or die(pg_last_error($conex));
	return $row = pg_fetch_array($Qmenu,0);
	
	
}

?>