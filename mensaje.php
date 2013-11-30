<?php
if(isset($_GET["mensaje"])){
	$mensaje = $_GET["mensaje"];
	echo ("<span class=\"log-in\">$mensaje</span> - <span class=\"sign-up\">Ingresa Nuevamente</span>");
}
else{
	echo ("<span class=\"log-in\">Hola</span> - <span class=\"sign-up\">¿Deseas Registrarte?</span>");
}
?>