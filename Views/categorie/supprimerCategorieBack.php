<?php
	include '../../Controller/CategorieC.php';
	$categorieC=new CategorieC();
	$categorieC->supprimerCategorie($_GET["id"]);
	header('Location:afficherCategorieBack.php');
?>