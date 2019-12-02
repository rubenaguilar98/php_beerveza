<?php 

	require_once "Sesion.php";


	$ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

		 $user = $ses->getUsuario()->getNombre() ;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>BeerVeza</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="BeerVeza.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>

</head>
<body id="body">

	<div class="container-flex">		
		<div class="navbar navbar-expand-lg bg-dark">
			<a class="navbar-brand text-warning" href="#">BeerVeza</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-warning" href="mainPaises.php">Paises</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-warning" href="mainMarcas.php">Marcas</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-warning" href="mainTipos.php">Cervezas</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link text-warning" href="perfil.php">Perfil</a>
					</li>

					<li class="nav-item">
						<a class="nav-link text-warning" href="logout.php">Salir</a>
					</li>

				</ul> 

			</div>	

			<div class="navbar-text text-warning">
				Bienvenido/a, <?= $user ?>
			</div>

		</div>	