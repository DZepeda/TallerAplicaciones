<?php
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$pass = $_POST["login"];
	$edad = $_POST["edad"];

	include("conexion.php");
	$consulta = "SELECT * FROM cliente WHERE email='$email'";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;

	if($num_regs == 0){
		$consulta = "INSERT INTO cliente (nombre_completo,email,pass,edad) VALUES ('$nombre','$email','$pass','$edad')";
		$ejecutar_consulta = $conexion->query(utf8_encode($consulta));

		if($ejecutar_consulta){
			for($i=1;$i<11;$i++){
				if($_POST["checkbox".$i.""] != "0"){
					$consulta = "INSERT INTO gustoCliente (email, ID_TipoComida) VALUES ('$email','$i')";
					$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
				}
			}
			$conexion->close();
			header("Location: index.html");
		}else{
			$mensaje = "Problema BD :(";
				header("Location: registro.php?mensaje=$mensaje");
		}
	}else{
		$mensaje = "Ya existe";
		header("Location: registro.php?mensaje=$mensaje");
	}
?>