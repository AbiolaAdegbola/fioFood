<?php 
session_start();

if (isset($_GET['id_element'])) {
	if (in_array($_GET['id_element'], $_SESSION['panier'])) {
		$tabl = $_SESSION['panier'];
		unset($tabl[array_search($_GET['id_element'], $tabl)]);
		$_SESSION['panier'] = $tabl;
	}
}

if (isset($_GET['id_elementcollecte'])) {
	if (in_array($_GET['id_elementcollecte'], $_SESSION['paniercollecte'])) {
		$tabl = $_SESSION['paniercollecte'];
		unset($tabl[array_search($_GET['id_elementcollecte'], $tabl)]);
		$_SESSION['paniercollecte'] = $tabl;
	}
}

if (isset($_GET['id_elementsupermarche'])) {
	if (in_array($_GET['id_elementsupermarche'], $_SESSION['paniersupermarche'])) {
		$tabl = $_SESSION['paniersupermarche'];
		unset($tabl[array_search($_GET['id_elementsupermarche'], $tabl)]);
		$_SESSION['paniersupermarche'] = $tabl;
	}
}

if (isset($_GET['id_ingredientsupp'])) {
	if (in_array($_GET['id_ingredientsupp'], $_SESSION['ingredient'])) {
		$tabl = $_SESSION['ingredient'];
		unset($tabl[array_search($_GET['id_ingredientsupp'], $tabl)]);
		$_SESSION['ingredient'] = $tabl;
	}
}

if (isset($_GET['id_preparation'])) {
	if (in_array($_GET['id_preparation'], $_SESSION['preparation'])) {
		$tabl = $_SESSION['preparation'];
		unset($tabl[array_search($_GET['id_preparation'], $tabl)]);
		$_SESSION['preparation'] = $tabl;
	}
}
?>