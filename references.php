<?php

// Init ref at 0 //
$ref = 0;

// Set random number to ref //
$rand = mt_rand(1000000 ,9999999);

//Take $_POST & set ref
if ($_POST['secteur'] == "processeur"){
	$ref = "Réf:" . $rand . "prc";
}

if ($_POST['secteur'] == "boitier") {
	$ref = "Réf:" . $rand . "btr";
}

if ($_POST['secteur'] == "carte_graphique") {
	$ref = "Réf:" . $rand . "cgr";
}

if ($_POST['secteur'] == "ddr") {
	$ref = "Réf:" . $rand . "ddr";
}

if ($_POST['secteur'] == "carte_mere") {
	$ref = "Réf:" . $rand . "cme";
}

if ($_POST['secteur'] == "alimentation") {
	$ref = "Réf:" . $rand . "alm";
}

if ($_POST['secteur'] == "ssd") {
	$ref = "Réf:" . $rand . "ssd";
}

if ($_POST['secteur'] == "refroidissement") {
	$ref = "Réf:" . $rand . "vtl";
}

if ($_POST['secteur'] == "connect") {
	$ref = "Réf:" . $rand . "con";
}