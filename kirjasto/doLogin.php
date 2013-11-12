<?php

require_once "kirjasto/näkymä.php";
require_once "login.php";

	if(empty($_POST["käyttäjätunnus"])) {
		naytaNakyma("login.php"));
	}

	if(empty($_POST["salasana"])) {
		naytaNakyma("login.php"));
	}

	$kayttajatunnus = $_POST["käyttäjätunnus"];
	$salasana = $_POST["salasana"];

	if(Kayttaja::getKayttaja($kayttajatunnus, $salasana) != null) {
		header('Location: ../html-demo/pääsivu.php');
	} else {
		naytaNakyma("login.php");
	}


?>

