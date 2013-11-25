<?php 
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/kayttaja.php";

	if(empty($_POST["kayttajatunnus"])) {
		naytaNakyma("rekisteröityminen.php", array('virhe' => "Käyttäjätunnus puuttuu."));
	} elseif(empty($_POST["salasana"])) {
		$lomake = (object)$_POST;
		naytaNakyma("rekisteröityminen.php", array('virhe' => "Salsana puuttuu.", 'lomake' => $lomake));
	} elseif(empty($_POST['salasanaVahva'])) {
		$lomake = (object)$_POST;
		naytaNakyma("rekisteröityminen.php", array('virhe' => "Salasana täytyy vahvistaa.", 'lomake' => $lomake));
	} else {
		$kaytettavyys = kayttaja::kayttajatunnusVapaa($_POST['kayttajatunnus']);
		
		if($kaytettavyys == false) {
			naytaNakyma("rekisteröityminen.php", array('virhe' => "Käyttäjätunnus on jo käytössä."));
		} else {
			if($_POST['salasana'] == $_POST['salasanaVahva']) {
				kayttaja::luoUusiKayttaja($_POST['kayttajatunnus'], $_POST['salasana']);
				$nykyinenKayttaja = Kayttaja::getKayttaja($_POST['kayttajatunnus'], $_POST['salasana']);
				session_start();
				$_SESSION['kirjautunut'] = $nykyinenKayttaja;
				header('Location: paasivu.php');
			} else {
				$lomake = (object)$_POST;
				naytaNakyma("rekisteröityminen.php", array('virhe' => "Salasana ja vahvistettava salasana eivät täsmää.", 'lomake' => $lomake));
			}
		}
	}	
