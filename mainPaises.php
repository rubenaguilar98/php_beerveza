<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="BeerVeza.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" sizes="16x16">
	<title>BeerVeza - Paises</title>
</head>
<body>
   
<?php

	include_once("navbar.php");
	include_once("Database.php");
	include_once("Paises.php");

	define("MAX_COL", 4) ;	
	define("MAX_ITEM", 16) ;

	if (!empty($_POST)):

		$nombre = $_POST["nombre"] ;
		$bandera = $_POST["bandera"] ;

			$db = Database::getInstance();

			$sql = "INSERT INTO pais (nomPais,imgPais) " ;
			$sql.= "VALUES (?,?) ;" ;

			$db->runQuery($sql, [$nombre, $bandera]);

			$pdo = null ;

	endif ;



	$db = Database::getInstance();

	$sql = "SELECT * FROM pais";

	if ($db->runQuery($sql)->rowCount()>0){
?>
		<form method="post">
			
			<div class="row form-group mt-5 ml-5">
				<div class="col-md-5">
					<input class="form-control" type="text" name="nombre" placeholder="Nombre pais" required />
				</div>

				<div class="col-md-5">
					<input class="form-control" type="text" name="bandera" placeholder="URL bandera" required />
				</div>

				<div class="col-md-2">
					<button class="btn btn-dark w-50" type="submit">Registrar</button>
				</div>
			</div>
		</form>	
<?php
		do {
						
			echo "<div class=\"row mt-5 mb-5\">" ;
			$col = 0 ;
			while (($col < MAX_COL) && ($item = $db->getObject("Paises"))):
?>
				<div class="col col-lg-3">
					<div class="card mx-auto bg-dark" style="width:17rem;">
						<img src="<?= $item->getImgPais() ?>" class="card-img-top" />
						<div class="card-body text-center text-white">
							<h6 class="card-title"><?= $item->getNomPais() ?></h6>
							<input type="hidden" name="CodPais" value=""/>
							<button type="submit"  class="btn btn-info">Modificar</button>
							<button type="submit"  class="btn btn-danger">Eliminar</button>
						</div>
					</div>
				</div>

<?php
				$col++ ;

			endwhile ;

			echo "</div>" ;

		} while ($item) ;	
	}
?>
</body>
</html>