<?php

function gestion_frais(){

	// Il faudra faire un script pour chaque fonction (prix_commande), (gestion_frais) et (prix_total) afin de pouvoir les afficher separement //

	$prix_commande = 0; // Recuperer le prix de l'article dans la base de donnés //
	$poids = $_POST["poids_article"];
	$frais_port = 0;

	if ($poids <= 2) {
		$frais_port = 8.80;
	}

	else if ($poids > 2 && $poids <= 5) {
		$frais_port = 13.15;
	}

	else if ($poids > 5 && $poids <= 10) {
		$frais_port = 19.20;
	}

	else if ($poids > 10 && $poids <= 30) {
		$frais_port = 27.30;
	}

		echo $frais_port;

	if ($poids > 30) {
		echo "Nous ne livrons pas les produits de plus de 30Kg";
		return false;
	}

	$prix_total = $prix_commande + $frais_port;
	return $prix_total;
}