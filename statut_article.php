<?php

function statut(){

	$articles = array($article => $nb_article);
	$nb_article = $_POST["nombre_articles_vente"];
	$nb_articles_achetes = $_POST["nombre_articles_achat"];
	$apres_achat_update = $nb_article - $nb_articles_achetes;

	if ($apres_achat_update > 0){
		echo "Disponible";
		return;
	}

	if ($apres_achat_update <= 0){
		echo "Rupture de stock";
		return;
	}
}