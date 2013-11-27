<?php
	function conectarse()
	{
		$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="wifipublicity";

		$conectar = new mysqli($servidor,$usuario,$password,$bd);
		return $conectar;
	}

	$conexion = conectarse();	
?>