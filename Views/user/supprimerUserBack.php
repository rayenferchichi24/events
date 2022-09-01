<?php
	include '../../Controller/UserC.php';
	$userC=new UserC();
	$userC->supprimerUser($_GET["id"]);
	header('Location:afficherUserBack.php');
?>