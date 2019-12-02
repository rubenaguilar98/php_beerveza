<?php
    require_once "Sesion.php" ;

	$ses = Sesion::getInstance() ;
    // cerramos sesion y redireccionamos al index
	$ses->close() ;
    $ses->redirect("index.php") ;
    
?>
