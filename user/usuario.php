<?php
	include("sesion.php");
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Pagina Usuario</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(../images/bg1.jpg);
			}
		</style>
    </head>

    <body>
        <div class="container">
			<section class="main">
				<h1><span class="log-in">BIENVENIDO</span> - <?php echo $_SESSION["usuario"];?> </h1>
				<p class="float">
					<label for="salir"><a href="salir.php">Salir</a></label>	
				</p>
			</section>	
        </div>
        <div class="container">
			<section class="main">
				<h1><span class="log-in">Para Hoy tenemos:</span> </h1>
				<?php include("promociones.php"); ?>
			</section>	
        </div>


    </body>
</html>