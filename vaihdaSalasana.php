<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
saakoNahdaSivun();
$id = $_SESSION['kirjautunut']->getKayttajaId();
$tiedot = kayttaja::haeKayttajaTiedot($id);
	if(empty($_POST['vanha'])) {
		naytaNakyma("omatTiedot.php", array('virhe' => "Vanha salasana puuttuu.", 'tiedot' => $tiedot));
	} else if(empty($_POST['uusi'])) {
		naytaNakyma("omatTiedot.php", array('virhe' => "Uusi salasana puuttuu.", 'tiedot' => $tiedot));
	} else if(empty($_POST['uusiVahva'])) {
		naytaNakyma("omatTiedot.php", array('virhe' => "Vahvista salasana.", 'tiedot' => $tiedot));
	} else {
		$kayttaja = $tiedot[0];
		if($kayttaja['salasana'] == $_POST['vanha'] AND $_POST['uusi'] == $_POST['uusiVahva']) {
			kayttaja::vaihdaSalasana($_POST['uusi'], $id);
			header('Location: paasivu.php');
		} else {
			naytaNakyma("omatTiedot.php", array('virhe' => "Vanha salasana ei täsmää."));
		}	
	}
