
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="" />
		<title>MANDADOS EXPRESS</title>
	
		<!--styles-->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <!--Bootstrap styles-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.css">
    
	</head>

	<body id="bodyIndex">
		<header class="header">
			<div class="redStrip">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 align-middle">
							<a href="index.php"><img src="assets/img/m_express_logo_white.svg" style="max-width: 200px;"></a>
						</div>
						<div class="col-8 align-middle text-right" style="margin-top: 5px;">
							
							<div class="dropdown mr-1">
							<?php

								session_start();

								
									

								
								if (isset($_SESSION['nomUser'])) {
									
									$nom =explode(" ", trim($_SESSION['nomUser']));
									$ape = explode(" ", trim($_SESSION['apeUser']));

									//echo ($_SESSION['urlFotoUser']);

									echo '<a href="?c=perfil&a=Perfil" style="text-decoration: none; color: white">
									<span>'.$nom[0].' '.$ape[0].'</span></a>
									&nbsp&nbsp<img id="imgUser" class="rounded-circle" src="'.$_SESSION['urlFotoUser'].'" style="width: 35px; height: 35px">
									<a style="background-color: red; border: none; padding: 0; margin-top: 2px; margin-left: 5px; width: 0px" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
								    </a>
								    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
								      	<a href="?c=perfil&a=Perfil" class="dropdown-item">Ver perfil</a>
								    	<a href="#" data-toggle="modal" data-target="#modalCambiarContrasenna" id="cambiarPass" class="dropdown-item">Cambiar contraseña</a>
								    	<a href="#" data-toggle="modal" data-target="#modalPregSeguridad" id="btnACambiarPregSeguridad" class="dropdown-item">Cambiar pregunta de seguridad</a>
								    	<a href="?c=reglogin&a=cerrar_sesion" class="dropdown-item">Cerrar sesión</a>
								    </div>';

								}else{
									echo '<a href="#" style="text-decoration: none; color: white" data-toggle="modal" data-target="#modalIngresoRegistro">
									<span>Ingresar/Registrarse</span></a>
									&nbsp&nbsp<img id="imgUser" class="" src="assets/img/icon/round-account_circle-white-24px.svg" style="width: 35px;">';
								}

							?>
							
							
							    
							</div>
						
						</div>
					</div>
				</div>
			</div>


			<div class="blackStrip">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-12 text-left" style=" padding-top: 8px;">
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#modalHacerMandados" style="background-color: red; width: 100%;"><img id="imandados" src="assets/img/icon/moto.svg">Hacer Mandados</a>
						</div>
						<div class="col-md-8 col-sm-12 text-right" style=" padding-top: 8px;">
							<nav id="Menu">
									<a href="?c=Nosotros&a=Nosotros"><img id="inosotros" src="assets/img/icon/silueta-de-multiples-usuarios.svg">Sobre Nosotros</a>
									<a href="?c=Contactos&a=Contactos"><img id="icontacto" src="assets/img/icon/receptor-del-telefono.svg">Contactanos</a>
									<a href="https://www.facebook.com/pages/category/Cargo---Freight-Company/Mandados-Express-841573632691960/" target="blank" data-toggle="tooltip" data-placement="top" title="facebook"><img  id="ifacebook" src="assets/img/icon/facebook-app-logo.svg" style="width: 25px"></a>
							</nav>
						</div>
					</div>
		    	</div>
		    </div>
    	</header>
    
		
