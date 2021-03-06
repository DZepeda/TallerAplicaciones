<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Custom Login Form Styling</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="patron1.css"/> <!-- estilo con designe responsive-->
        
        <script src="js/modernizr.custom.63321.js"></script>

        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(images/bg1.jpg);
			}
		</style>


<script type="text/javascript">
// funcion con ajax
function showHint(str){
	if (str.length==0){ 
  		document.getElementById("txtHint").innerHTML="";
  		return;
  	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  		}
 	}
	xmlhttp.open("GET","gethint.php?q="+str,true);
	xmlhttp.send();
}
</script>


<script type="text/javascript">
// funcion con ajax
function show(str){
	if (str.length==0){ 
  		document.getElementById("txtHint1").innerHTML="";
  		return;
  	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
  		}
 	}
	xmlhttp.open("GET","gethint.php?q="+str,true);
	xmlhttp.send();
}
</script>

<script type="text/javascript">

//validar contraseña 
function validarPasswd () { 
  var p1 = document.getElementById("pass1").value;
  var p2 = document.getElementById("pass2").value;
  var espacios = false;
  var cont = 0;
  // Este bucle recorre la cadena para comprobar
  // que no todo son espacios
	while (!espacios && (cont < p1.length)) {
        if (p1.charAt(cont) == " ")
            espacios = true;
            cont++;
    }
  	if (espacios) {
   		alert ("La contraseña no puede contener espacios en blanco");
   		return false;
  	}
   	if (p1.length == 0 || p2.length == 0) {
   		alert("Los campos de la password no pueden quedar vacios");
   		return false;
  	}
  	if (p1 != p2) {
   		alert("Las passwords deben de coincidir");
   		return false;
  	} else {
   		alert("Todo esta correcto");
   		return true; 
  	}
}
	
// funcion para validar correo electronico

function validarEmail( idMail) {
//Creamos un objeto 
	object=document.getElementById(idMail);
	valueForm=object.value;
// Patron para el correo
	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	if(valueForm.search(patron)==0){
		//Mail correcto
		object.style.color="#000";
		return;
	}
	//Mail incorrecto
	object.style.color="#f00";
}


// funcion para validar el ingreso de la edad.
function validar(obj) {
  	txt = obj.value;
  	if(parseInt(txt) != parseFloat(txt)) {
    	alert('Sólo números enteros');
    	obj.focus();
  	}
}

<?php include("mensaje.php"); ?>

</script>


</head>
<body>
	<section>
		<h1>Wifi - Publicity</h1>
		<p>

			


		</p>
	</section>
	<section>
		<article class="fila1">
			<h1> < - - - - inicio de sesión - - - - > </h1>
		

		<div class="container">
			<section class="main">
				<form name="form1" method="POST" action="validar.php" class="form-2">
					<h1><span class="log-in">BIENVENIDO</span> - <span id="txtHint"></span> </h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>¿Tu usuario?</label>
						<input type="email" required name="email" onkeyup="showHint(this.value)" placeholder="Tu email es:">
					</p>
					<p class="float">
						<label for="password"><i class="icon-lock"></i>¿Tu contraseña?</label>
						<input type="password" required name="login" placeholder="Tu contraseña es:" class="showpassword">
					</p>
					<p>&nbsp;</p>
					<p class="clearfix"> 
						<input type="reset" name="Cancel" value="¿Te equivocaste?">
						<input type="submit" name="Enviar" value="Enviando..." >
					</p>
					<p class="float">
					</p>
				</form>​​
			</section>	
        </div>

        <h1> < - - - - ¿Eres Nuevo?, te invito a registrarte - - - - > </h1>
		
			
			
    <div class="container">
		<section class="main">
			



			<form class="form-2" name="form1" method="POST" action="enviar.php" onSubmit="return validarPasswd()">
					
					<h1><span class="log-in">Crear Nuevo</span> - <span class="sign-up"><span id="txtHint1"></span></span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>¿Tu nombre?</label>
						<input type="text" required name="nombre" placeholder="Nombre">
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>¿Tu email?</label>
						<input type="email" id="email" required name="email" placeholder="Tu email" onkeyup="show(this.value)">

						<!--onKeyUp="javascript:validarEmail( 'email' )"-->
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>¿Contraseña?</label>
						<input id="pass1" type="password" required name="login" placeholder="Contraseña">
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>¿Repetir contraseña?</label>
						<input id="pass2" type="password" required name="login" placeholder="Reiterar Pass.">
					</p>
					<p class="float">
						<label for="text"><i class="icon-lock"></i>¿Que edad tienes?</label>
					<input type="number" id="edad" required name="edad" min="0" maxlength="3" max="150" placeholder="Edad" onblur = "validar(this)">
					</p>

					<p>
					</p>

         
         			 <table id="tbl" border="0">
						<thead>
							<tr>
								<td>.</td>
								<td></td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>
									<input type="hidden" name="checkbox1" value="0">
									<input type="checkbox" name="checkbox1" value="1"/>
								</td>
								<td>Ensaladas</td>
 							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox2" value="0">
									<input type="checkbox" name="checkbox2" value="1"/>
								</td>
								<td>Sopas</td>
								</tr>


							<tr>
								<td>
									<input type="hidden" name="checkbox3" value="0">
									<input type="checkbox" name="checkbox3" value="1"/>
								</td>
								<td>Arroces</td>
							</tr>


							<tr>
								<td>
									<input type="hidden" name="checkbox4" value="0">
									<input type="checkbox" name="checkbox4" value="1"/>
								</td>
								<td>Legumbres</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox5" value="0">
									<input type="checkbox" name="checkbox5" value="1"/>
								</td>
								<td>Verduras y Hortalizas</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox6" value="0">
									<input type="checkbox" name="checkbox6" value="1"/>
								</td>
								<td>Pescado</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox7" value="0">
									<input type="checkbox" name="checkbox7" value="1"/>
								</td>
								<td>Pastas</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox8" value="0">
									<input type="checkbox" name="checkbox8" value="1"/>
								</td>
								<td>Carnes</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox9" value="0">
									<input type="checkbox" name="checkbox9" value="1"/>
								</td>
								<td>Postres</td>
							</tr>

							<tr>
								<td>
									<input type="hidden" name="checkbox10" value="0">
									<input type="checkbox" name="checkbox10" value="1"/>
								</td>
								<td>Tragos</td>
							</tr>

						</tbody>
					</table>
      				<p>&nbsp;</p>

					<p class="clearfix"> 
						<input type="reset" name="Cancel" value="¿Te equivocaste?">
						<input type="submit" name="Enviar" value="Enviando...">
						   
						
					</p>
					
				</form>​​








		</section>	
    </div>

			
		</article>
	</section>
</body>
</html>