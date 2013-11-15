<?php

require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";

	if(empty($_POST["käyttäjätunnus"])) {
		naytaNakyma("loging.php", array('virhe' => "Kirjautuminen ei onnistu! Käyttäjätunnus puuttuu."));
	}

	if(empty($_POST["salasana"])) {
		naytaNakyma("loging.php", array('virhe' => "Kirjautuminen ei onnistu! Salasana puuttuu."));
	}

	$kayttajatunnus = $_POST["käyttäjätunnus"];
	$salasana = $_POST["salasana"];

	$nykyinenKayttaja= Kayttaja::getKayttaja($kayttajatunnus, $salasana);

	if($nykyinenKayttaja != null) {
		session_start();
		$_SESSION['kirjautunut'] = $nykyinenKayttaja;
		header('Location: paasivu.php');
	} else {
		naytaNakyma("loging.php", array('virhe' => "Kirjautuminen ei onnistu! Tarkista käyttäjätunnus ja salasana."));
	}


?>

