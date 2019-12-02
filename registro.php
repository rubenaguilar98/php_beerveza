<?php

		require_once("Database.php"); 

	if (!empty($_POST)):

		$email = $_POST["email"] ;
		$nombre = $_POST["nombre"] ;
		$apellidos = $_POST["apellidos"] ;
		$pass = $_POST["pass"] ;
		$conf = $_POST["conf"] ;
		$fec = !empty($_POST["fnac"])?$_POST["fnac"]:null ;

		if ($pass==$conf):

			$db = Database::getInstance();

			$sql = "INSERT INTO usuario (email,nombre,apellidos,pass,fec_nacimiento) " ;
			$sql.= "VALUES (?, ?, ?, md5(?), ?) ;" ;

			$db->runQuery($sql, [$email, $nombre, $apellidos, $pass, $fec]);

			$pdo = null ;

		else:
			$error = "Las contraseñas no coinciden" ;
		endif ;

	endif ;


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>BeerVeza</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="BeerVeza.css">
	<link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body id="body">

	<div class="container">

		<div class="row">
			<div class="col-sd-12 mx-auto">
				<img id="logo" src="img/beer.png" alt="BeerVeza" />
				<h1>BeerVeza</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-sd-12 mx-auto mb-5">
				<h4>Registro de Usuarios</h4>
			</div>
		</div>
	
		<?php
			if (isset($error)):
				echo "<div class=\"alert alert-danger w-50 mx-auto\">" ;
				echo $error ;
				echo "</div>" ;
			endif ;
		?>

		<form method="post">
			
			<div class="row form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="email">Email:</label>
					<input class="form-control" type="email" name="email" 
						   placeholder="email@beerveza.com" required />
				</div>

				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="apellidos">Apellidos:</label>
					<input class="form-control" type="text" name="apellidos" required />
				</div>

				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="pass">Contraseña:</label>
					<input class="form-control" type="password" name="pass" 
						   required />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf" required />
				</div>

				<div class="col-md-6 mx-auto">
					<label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
					<input class="form-control" type="date" name="fnac" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-dark w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="http://localhost/cerveza/index.php" class="btn btn-outline-dark">Volver atrás</a>
			</div>
		</div>

	</div>

	<br/>

</body>
</html>