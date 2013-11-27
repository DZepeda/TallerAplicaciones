<?php
	$nombre = $_SESSION["usuario"];
	include("conexion.php");
	$consulta = "select distinct pu.nombre as Publicidad, pu.imagen, pro.nombre as Promocion,  pro.descripcion, pro.valor 
					from cliente c, gustoCliente gc, TipoPublicidad tp, publicidad pu, promo pr, promocion pro
					where c.nombre_completo=\"$nombre\" 
					and c.email=gc.email 
					and gc.ID_TipoComida=tp.ID_TipoComida 
					and tp.ID_Publicidad=pu.ID_Publicidad
					and pu.ID_Publicidad=pr.ID_Publicidad
					and pr.ID_Promocion=pro.ID_Promocion";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;

	if($num_regs == 0)
	{
		echo "<br /> <span class='mensaje'><b>$nombre</b> no Tienes promocion asociada</span> <br /> <br />";		
	}
	else
	{	
		while($registro = $ejecutar_consulta->fetch_assoc()){
			$publicidad = utf8_encode($registro["Publicidad"]);
			$promocion = utf8_encode($registro["Promocion"]);
			$descripcion = utf8_encode($registro["descripcion"]);
			$valor = "$ ".utf8_encode($registro["valor"]);
			$url_imagen = utf8_encode($registro["imagen"]);

			echo "<table id=\"invisible\">";
				echo "<td id=\"invisible\">";
					echo "<table id=\"invisible\">";
						echo "<tr id=\"invisible\">
								<td id=\"invisible\"><label for=\"publicidad\">Publicidad:</td>
								<td id=\"invisible\"><input type=\"text\" value=\"$publicidad\" disabled /></td>
							</tr>";
						echo "<tr id=\"invisible\">
								<td id=\"invisible\"><label for=\"promocion\">Promocion:</td>
								<td id=\"invisible\"><input type=\"text\" value=\"$promocion\" disabled /></td>
							</tr>";
						echo "<tr id=\"invisible\">
								<td id=\"invisible\"><label for=\"descripcion\">Descripcion:</td>
								<td id=\"invisible\"><input type=\"descripcion\" value=\"$descripcion\" disabled /></td>
							</tr>";
						echo "<tr id=\"invisible\">
								<td id=\"invisible\"><label for=\"valor\">Valor:</td>
								<td id=\"invisible\"><input type=\"text\" value=\"$valor\" disabled /></td>
							</tr>";

						echo "<tr id=\"invisible\">
								<td id=\"invisible\"><label for=\"url\">Url_Imagen:</td>
								<td id=\"invisible\"><input type=\"text\" value=\"$url_imagen\" disabled /></td>
							</tr>";
					echo "</table>";
				echo "</td>";
				echo "<td id=\"invisible\">";
						echo "       ";
				echo "</td>";
				echo "<td id=\"invisible\">";
						echo "<IMG SRC=\"$url_imagen\"/>";
				echo "</td>";
			echo "</table>";


			echo "</br></br>";
		}

			

		$conexion->close();

		
	}
?>