<?php

		require_once("Database.php"); 
		require_once("Sesion.php");

		$ses = Sesion::getInstance() ;
		

		if (!$ses->checkActiveSession())
		$ses->redirect("index.php") ;

  	    $user = $ses->getUsuario() ;
   if (isset($_POST["borrar"])) {
	   $pdo = Database::getInstance();
	   $idUsu = $_POST["borrar"];
	   $query = "DELETE FROM usuario where idUsu = '$idUsu'";
	   $pdo->runQuery($query)
		   or die("Se ha producido un error al apuntarse en el torneo");
	   if ($pdo) {
		   require_once("logout.php");
	   }
		   
	   $pdo = null;
   }

		if (!empty($_POST)) :
			$email = $_POST["email"];
			$nombre = $_POST["nombre"];
			$apellidos = $_POST["apellidos"];
			$pass = $_POST["pass"];
			$conf = $_POST["conf"];
			$fec = !empty($_POST["fnac"]) ? $_POST["fnac"] : null;

			if ($pass == $conf) :

				$db = Database::getInstance();

				$sql = "UPDATE usuario SET email=?,pass=MD5(?) ,nombre=? ,apellidos=? ,fec_nacimiento=? ";
				$sql .= "WHERE idUsu=" . $ses->getUsuario()->getIdUsu();
				$ok = $db->runQuery($sql, [$email, $pass, $nombre, $apellidos, $fec])
				or die("Se ha producido un error.");
				;

				$pdo = null;
			else :
				$error = "Las contraseñas no coinciden";
			endif;
		endif;


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

	<div class="container-flex">		
		<div class="navbar navbar-expand-lg bg-dark">
			<a class="navbar-brand text-warning" href="#">BeerVeza</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon" href="main.php"></span>
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
				Has iniciado sesión como: <?=$user->getNombre(). " " .$user->getApellidos()?> 
			</div>

		</div>	



        </div> 


	<div class="container">

	<?php
		$db = Database::getInstance();

		$user = $ses->getUsuario();
		
		?>
 		<h1>Nombre : <?= $user->getNombre() ?></h1>
		<h1>Apellidos : <?= $user->getApellidos() ?></h1>
		<h1>Email : <?= $user->getEmail() ?></h1>
		<h1>Fecha Nacimiento : <?= $user->getFecNacimiento() ?></h1>


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
                    <button class="btn btn-primary w-100" type="submit">Actualizar</button>
                </div>
            </div>
            <?php if ((isset($ok)) && ($ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-success w-50 mx-auto" role="alert">
					  Actualizado.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>
		</form>

		<div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <form action="" method="post">
						<input type="hidden" value="<?= $ses->getUsuario()->getIdUsu() ?>" name="borrar">
                        <button class="btn btn-danger w-100" type="submit">Eliminar Cuenta</button>
                    </form>
                </div>
            </div>

		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="http://localhost/cerveza/index.php" class="btn btn-outline-dark">Volver atrás</a>
			</div>
		</div>

	</div>

	<br/>

</body>
</html>