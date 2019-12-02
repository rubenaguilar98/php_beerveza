<?php

	require_once("Sesion.php") ;

	$ses = Sesion::getInstance() ;

	if ($ses->checkActiveSession())
		$ses->redirect("main.php") ;

	if (!empty($_POST)):

		$email = $_POST["email"] ;
		$pass  = $_POST["pass"] ;

		$ok  = $ses->login($email, $pass) ;

		if ($ok) $ses->redirect("main.php?p=1") ;

	endif ;

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title> BeerVeza </title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="BeerVeza.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body id="body">

	<div class="container">

		<div class="row">
			<div class="col-sd-12 mx-auto">
                <img id="logo-index" src="img/beer.png" alt="BeerVeza" />
                <h1 id="eslogan">BeerVeza</h1>
				<h1>Login</h1>
			</div>
		</div>

		<form method="post">

			<div class="row mt-5 form-group">
        <div class="col-md-12">
					<input class="form-control w-50 mx-auto" type="text" name="email" placeholder="email@beerveza.com" required />
        </div>
			</div>

			<div class="row mt-2 form-group">
				<div class="col-md-12">
					<input class="form-control w-50 mx-auto" type="text" name="pass" placeholder="Contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($ok)) && (!$ok)):
			?>
			<div class="row mt-2">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50" role="alert">
					  Usuario o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-dark w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		<div class="row">
			<div class="col-md-12 text-center">
				<a href="registro.php" class="btn btn-outline-dark">Registrar</a>
			</div>
		</div>

	</div> 
</body>
</html>