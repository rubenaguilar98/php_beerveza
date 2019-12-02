<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="BeerVeza.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" sizes="16x16">
	<title>BeerVeza - Marcas</title>
</head>
<body>
   
<?php

	include_once("navbar.php");
	include_once("Database.php");
	include_once("Marcas.php");

	define("MAX_COL", 4) ;	
	define("MAX_ITEM", 16) ;

	$db = Database::getInstance();

	$sql = "SELECT * FROM marca";

	if ($db->runQuery($sql)->rowCount()>0){

		do {
						
			echo "<div class=\"row mt-5 mb-5\">" ;
			$col = 0 ;
			while (($col < MAX_COL) && ($item = $db->getObject("Marcas"))):
?>
				<div class="col col-lg-3">
					<div class="card mx-auto bg-dark" style="width:17rem;">
						<img src="<?= $item->getImgMarca() ?>" class="card-img-top" />
						<div class="card-body text-center text-white">
							<h6 class="card-title"><?= $item->getNomMarca() ?></h6>
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