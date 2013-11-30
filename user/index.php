<?php
	include("sesion.php");
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Wifi-Publicity</title>
    <link rel="stylesheet" href="./css/home.css"> 
    <link href="../css/style1.css" rel="stylesheet" type="text/css">        
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Inicio Productos--> 
    <section class="portfolio" id="prod" style="position:relative; ">
        <div class="container">
            <div class="row">
                <div class="span12 center">
                    <h1 class="big-heading" id="letra_grande"><font><font>Productos a su disposición</font> </font></h1>  
                    <h4 class="sub-heading"><font><font>Solo solicitelo Sr(a): <?php include("nombre.php"); ?></font></font></h4>
                </div>
                <div class="span10" id="ancho_productos">
  
<?php
	$consulta = "select distinct pu.nombre as Publicidad, pu.imagen, pro.nombre as Promocion,  pro.descripcion, pro.valor 
					from cliente c, gustoCliente gc, TipoPublicidad tp, publicidad pu, promo pr, promocion pro
					where c.email=\"$email\" 
					and c.email=gc.email 
					and gc.ID_TipoComida=tp.ID_TipoComida 
					and tp.ID_Publicidad=pu.ID_Publicidad
					and pu.ID_Publicidad=pr.ID_Publicidad
					and pr.ID_Promocion=pro.ID_Promocion";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;
	if($num_regs == 0){
		echo "<br /> <span class='mensaje'><b>$nombre</b> no Tienes promocion asociada</span> <br /> <br />";		
	}
	else{	
		while($registro = $ejecutar_consulta->fetch_assoc()){
			$publicidad = utf8_encode($registro["Publicidad"]);
			$promocion = utf8_encode($registro["Promocion"]);
			$descripcion = utf8_encode($registro["descripcion"]);
			$valor = "$ ".utf8_encode($registro["valor"]);
			$url_imagen = utf8_encode($registro["imagen"]);

			echo "
                <a href=\"#\">
                    <div class=\"span3 project bloque_producto\" id=\"imagen_producto\">        
                        <img src=\"$url_imagen\"  class=\"img-rounded\"> 
                        <span class=\"overlay\"> </span>
                        <div class=\"cnt\">
                            <h4><font><font>$promocion</font></font></h4>
                            <h4><font><font> $valor</font></font></h4>
                            <h6><i class=\"icon-user\"></i> $descripcion</h6>
                            <br>
                            <a href=\"#\" class=\"btn btn-warning btn-large\"><font><font>¿Lo quieres?</font></font></a>
                        </div>
                    </div>
                </a>";        
      	}
 	$conexion->close();
	}
?>          
    </section>
</body>

</html>

