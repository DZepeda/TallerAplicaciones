<?php		
	include("conexion.php");
	$consulta="SELECT nombre_completo, email, pass FROM cliente";
	$ejectutar_consulta=$conexion->query($consulta);
	$flag=0;
	while($registro = $ejectutar_consulta->fetch_assoc()){
		$nombre = utf8_encode($registro["nombre_completo"]);
		$usuario = utf8_encode($registro["email"]);
		$contraseña = utf8_encode($registro["pass"]);
		if($_POST["email"]==$usuario && $_POST["login"]==$contraseña){
			$flag=1;
			session_start();
			$_SESSION["autentificado"] = true;
			$_SESSION["usuario"] = $usuario;				
			header("Location: user/index.php");
		}
	}
	if($flag==0){
		header("Location: index.html");
	}
$conexion->close();
	
?>