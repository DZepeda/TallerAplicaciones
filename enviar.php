<?php
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$pass = $_POST["login"];
	$edad = $_POST["edad"];

	include("conexion.php");
	$consulta = "SELECT * FROM cliente WHERE email='$email'";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;
	$flag=0;
	for($i=1;$i<11;$i++){
		if($_POST["checkbox".$i.""] != "0"){
			$flag=1;
		}
	}
	if($num_regs == 0){
		$consulta = "INSERT INTO cliente (nombre_completo,email,pass,edad) VALUES ('$nombre','$email','$pass','$edad')";
		if((strlen ($pass) > 5) && (strlen($pass)<17)){
			if($flag==1){
				if($edad > 12 && $edad <90){
					$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
					if($ejecutar_consulta){
						for($i=1;$i<11;$i++){
							if($_POST["checkbox".$i.""] != "0"){
								if($i!=10 || $edad>17){
									$consulta = "INSERT INTO gustoCliente (email, ID_TipoComida) VALUES ('$email','$i')";
									$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
									$mensaje = "Cliente Registrado :)";
								}else{
									$mensaje = "Ud. es menor de 18 años, no puede seleccionar bebidas alcoholicas";
								} 
							}
						}
					}else{
						$mensaje = "Usuario No registrado, Problema con la Base de Datos";
					}
				}else{
					$mensaje = "Ud. es menor de edad, no puede registrarse al sistema";
				}
			}else{
				$mensaje = "Tiene que escoger al menos 1 tipo de comida";
			}		
		}else{
			$mensaje = "La contraseña debe estar entre 6 a 16 caracteres";
		}
	}else{
		$mensaje = "Ya existe el correo electronico en el sistema";
	}
	$conexion->close();
	header("Location: index.php?mensaje=$mensaje");
?>