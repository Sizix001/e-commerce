<?php

function gestion_frais(){

	// It will be necessary to make a script for each function (price command), (management expenses) and (price_total) in order to be able to display them separately

	$prix_commande = 0; // Retrieve the price of the article in the database
	$poids = $_POST['poids_commande'];
	$frais_port = 0;

	// if the price is more than 350 euros the shipping costs are free
	if ($prix_commande >= 350){
		$frais_port = 0;
	}

	// calculate the price by weight
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

	// if the weight is more then 30 kg we don't deliver
	if ($poids > 30) {
		echo "Nous ne livrons pas les produits de plus de 30Kg";
		return false;
	}

	// error handling in case of negative weight
	if ($poids <= 0) {
		return false;
	}

	$prix_total = $prix_commande + $frais_port;

	// premium handling
	$premium = false;
	$shipping_premium = $frais_port / 2;

	 if ($premium == true) {
		echo $shipping_premium;
	}
}