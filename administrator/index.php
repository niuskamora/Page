<?php
session_start();

include("../recursos/funciones.php");
$var=conectar();
if(isset($_SESSION["usuarioadmin"]) && isset($_SESSION["passwordadmin"])){
	iraURL('../administrator/principal.php');
	}
if (isset($_POST["Biniciar"])) {
    $user = $_POST["usuario"];
    $pass = $_POST["password"];

    if (crearsesion($user, $pass)) {
        if (validarlogin()) {
            llenarLog(4, "Inicio sesión");  
			iraURL('../administrator/principal.php');
        }
    }else {
	javaalert("Debe agregar el usuario y contraseña");
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Pangea Technologies ::</title>
<link href="../recursos/css/bootstrap.css" rel="stylesheet" />
<link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="../recursos/css/bootstrap-responsive.css" rel="stylesheet">
<link href="../recursos/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="../recursos/css/estiloadmin.css" rel="stylesheet" />
</head>

<body>

<div class="container" align="center">

      <form class="form-signin" id="FormInicio" method="post">
        <h3 class="form-signin-heading">Por favor, inicie sesión</h3>
        <input type="text" class="input-block-level" placeholder="Usuario" name="usuario" id="usuario"  maxlength="34" pattern="[a-z.ñ]{1,34}" title="Solo se admite minúsculas y punto" autofocus required>        
        <input type="password" class="input-block-level" placeholder="Contraseña" name="password" id="password" required>
        <button class="btn btn-large btn-primary" type="submit" name="Biniciar">Iniciar Sesión</button>
      </form>

    </div> <!-- /container -->
<script type="text/javascript" src="../recursos/js/jquery-2.0.2.js" ></script> 
<script src="../recursos/js/bootstrap.js"></script>

</body>
</html>