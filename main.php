<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="BeerVeza.css">
	<link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" sizes="16x16">
	<title>BeerVeza - Principal</title>
</head>
<body>
   
<?php

	include_once("navbar.php");
	include_once("Database.php");
	include_once("Usuario.php");

	$db = Database::getInstance();

	$sql = "SELECT * FROM usuario";

	if ($db->runQuery($sql)->rowCount()>0){

		?>
			<table class="table table-dark table-striped">
  				<thead>
    				<tr>
     				<th scope="col">ID</th>
     				<th scope="col">Nombre</th>
     				<th scope="col">Apellidos</th>
      				<th scope="col">Email</th>
    				</tr>
				  </thead>
  				<tbody>
    				<tr id="Hola">
					<?php

					while ($item = $db->getObject("usuario")){
					?>
					<td><?= $item->getIdUsu();?></td>
					<td><?= $item->getNombre();?></td>
					<td><?= $item->getApellidos();?></td>
					<td><?= $item->getEmail();?></td>
					</tr>
					<?php
					}	
	}
					?>						
  				</tbody>
			</table>
</body>
</html>





		
