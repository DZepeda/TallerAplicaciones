<?php

$q=$_GET["q"];

$conexion= new mysqli('localhost','root','','wifipublicity');

    $consulta = "select email from cliente where email = '$q'";
    $result = $conexion->query($consulta);

    if( $result->num_rows > 0)
        $a[1]=0;
         //usuario ya existe
    else
        $a[1]=1;
         //no existe en la BD

if ($a[1] == 1)
  {
  $response="Usuario No registrado";
  }
if($a[1] == 0)
  {
  $response="Usuario registrado";
  }
//output the response
echo $response;

?>