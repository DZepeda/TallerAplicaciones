<?php
	$email = $_SESSION["usuario"];
	include("conexion.php");
	$consulta = "select nombre_completo from cliente where email=\"$email\"";
	$ejecutar_consulta = $conexion->query($consulta);
	$registro = $ejecutar_consulta->fetch_assoc();
	$nombre = utf8_encode($registro["nombre_completo"]);
	echo $nombre;
?>