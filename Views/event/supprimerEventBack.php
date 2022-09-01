<?php
	include '../../Controller/EventC.php';
	$eventC=new EventC();
	$eventC->supprimerEvent($_GET["id"]);
	header('Location:afficherEventBack.php');
?>