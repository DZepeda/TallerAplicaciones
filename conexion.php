<?php
function conectarse(){
	$servidor="localhost";
	$usuario="root";
	$password="root";
	$bd="wifipublicity";
	$conectar = new mysqli($servidor,$usuario,$password,$bd);
	return $conectar;
}
$conexion = conectarse();	
?>