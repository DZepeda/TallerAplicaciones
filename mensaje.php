<?php
if(isset($_GET["mensaje"])){
	$mensaje = $_GET["mensaje"];
	echo ("setTimeout(\"alert('$mensaje')\",800);");
}
?>