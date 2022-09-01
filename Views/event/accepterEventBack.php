<?php
	include '../../Controller/EventC.php';
	$eventC=new EventC();
	$eventC->accepterEvent($_GET["id"]);
	header('Location:afficherEventBack.php');
?>